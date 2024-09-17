<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Search Data</title>

    <link rel="stylesheet" href="{{ asset('css/insert.css') }}">
</head>



<body class="body-container">


    <form id="searchForm" class="form-container" action="/api/bst/search" method="GET">
                 <div class="form-wrapper">
                 <section class="form-section">

                    <button type="button" class="back-btn" onclick="window.location.href='/'">Back</button>

                 <h1 class="form-title">Search Value</h1>

                <div class="input-group">
                    <label for="searchValue">Search Value</label>
                    <input type="text" id="searchValue" name="value" placeholder="">

                </div>

                <div class="input-group">
                    <label for="searchRootId">Root ID</label>
                    <input type="text" id="searchRootId" name="root_id" placeholder="">

                </div>

                <button type="submit" class="submit-btn">Search</button>

                <div class="search-results">
                    <span id="searchResult"></span>
                </div>


            </section>

        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#searchForm').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: '/api/bst/search',
                    type: 'GET',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#searchResult').html("<div class='alert alert-success text-center'>Value Found: " + JSON.stringify(response) + "</div>");
                    },
                    error: function(xhr) {
                        $('#searchResult').html("<div class='alert alert-danger text-center'>Value Not Found</div>");
                    }
                });
            });
        });
    </script>
</body>
</html>
