<?php
session_start();
if (!isset($_SESSION['username'])) {
  echo '<h1 style="margin: 0; padding: 0;">You need to be logged in to view this page</h1>';
  die();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Bootstrap Select CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
  

    <title>Hello, world!</title>
  </head>
  <body>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Movie</th>
            <th scope="col">Status</th>
            <th scope="col">Share Rating</th>
            <th scope="col">Shared By</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ShareHelpers.php';
            include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
            $mainShares = ShareHelpers::getMainShares();
            foreach($mainShares as $mainShare) {
              echo '
              </tr>
                <td>' . $mainShare->get("Movie")->get('Name') . '</td>
                <td>' . $mainShare->get("Status") . '</td>
                <td>' . $mainShare->get("ApprovalRating") . '</td>
                <td>' . $mainShare->get("Owner")->get("Username") . '</td>
                <td>'
              .
              (($_SESSION['isAdmin'] || UserHelpers::getCurrentUser()->get("UserId") == $mainShare->get("RequestBy")) ? '<button class="edit-share-btn" data-toggle="modal" data-target="#exampleModal" data-movieId="' . $mainShare->get("MovieId") .'" data-shareId="' . $mainShare->get("Id") . '">Edit</button><button class="delete-share-btn" data-shareId="' . $mainShare->get("Id") . '">Delete</button>' : '');
              if (!(UserHelpers::getCurrentUser()->get("UserId") == $mainShare->get("RequestBy"))) {
                echo ShareHelpers::userHasRequestToShare(UserHelpers::getCurrentUser()->get("UserId"), $mainShare->get("Id")) ? 
                '<button class="cancel-request-btn" data-shareId="' . $mainShare->get("Id") . '">Cancel Request</buttton>' :
                '<button class="request-share-btn" data-shareId="' . $mainShare->get("Id") . '">Request Share</buttton>'; 
              }
              echo '
              </td>
              </tr>';
            }
          ?>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>@mdo</td>
          </tr>
        </tbody>
      </table>


    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="form-group">
          <label for="recipient-name" class="col-form-label">Recipient:</label>
          <input type="text" class="form-control" id="recipient-name">
        </div>
        <div class="form-group">
          <label class="col-form-label">Movie:</label>
          <select id="movies-select" class="selectpicker">
            <?php
              include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/MovieHelpers.php';
              $movies = MovieHelpers::getMovies();
              foreach ($movies as $movie) {
                echo '<option value="' . $movie->get("Id") . '">' . $movie->get("Name") . '</option>';
              }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label class="col-form-label">Requests:</label>
          <div id="request-list-container">

          </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="share-edit-save-btn" type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Bootstrap Select CSS -->
    <!-- Bootstrap Select JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script>
      $(document).ready(() => {
        $('.request-share-btn').click((event) => {
          $.ajax({
            url: '/api/shares/requestJoin.php',
            type: 'POST',
            dataType: 'json',
            data: {shareId: $(event.target).data("shareid")},
            success: function(data) {
              alert(data["description"]);
              location.reload();
            }
          });
        });


        $('.cancel-request-btn').click((event) => {
          $.ajax({
            url: '/api/shares/cancelRequest.php',
            type: 'POST',
            dataType: 'json',
            data: {shareId: $(event.target).data("shareid")},
            success: function(data) {
              alert(data["description"]);
              location.reload();
            }
          });
        });

        $('.delete-share-btn').click((event) => {
          $.ajax({
            url: '/api/shares/delete.php',
            type: 'POST',
            dataType: 'json',
            data: {shareId: $(event.target).data("shareid")},
            success: function(data) {
              alert(data["description"]);
              location.reload();
            }
          });
        })


        $('.edit-share-btn').click((event) => {
          $('.selectpicker').selectpicker('val', $(event.target).data("movieid"));
          $('#share-edit-save-btn').attr('shareid', $(event.target).data("shareid"));
          $('#request-list-container').empty();
          $.ajax({
            url: '/api/shares/getShareRequests.php',
            type: 'POST',
            dataType: 'json',
            data: {shareId: $(event.target).data("shareid")},
            success: function(res) {
              $.each(res.data, (index, req) => {
                let newCheckEl = "<input " + (req.isApproved ? " checked" : "") + " class='user-request' type='checkbox' value=" + req.id + ">" + req.owner.username + "</input>";
                
                $('#request-list-container').append(newCheckEl)
              });
              
              $('.user-request').click((event)=> {
                  $.ajax({
                    url: '/api/shares/alterRequestStatus.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {shareId: $(event.target).val(), isApproved: !!(event.target.checked) ? 1 : 0},
                    success: (res) => alert(res.description)
                  })
                });
              
          }});
        });

        $('#share-edit-save-btn').click(()=>{
          $.ajax({
                    url: '/api/shares/edit.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {shareId: $(event.target).attr("shareid"), movieId: $('#movies-select').val()},
                    success: res => alert(res['data'])
                  });
        });

      })
    </script>
      
  </body>
</html>