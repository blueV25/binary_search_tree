<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Insert Data</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/insert.css') }}">
</head>



<body class="body-container">
    <form id="insertForm" class="form-container">
        @csrf

        <div class="form-wrapper">
            <section class="form-section">
                <h1 class="form-title">Binary Search Tree</h1>

                <div class="input-group">
                    <label class="label" for="value">Value</label>
                    <input type="number" id="value" placeholder="Insert value" name="value" required>

                </div>

                <div class="input-group">
                    <label class="label" for="root_Id">Root child id (Optional)</label>
                    <input type="number" id="root_Id" placeholder="Insert root ID" name="root_id">

                </div>

                <button type="submit" class="submit-btn">Insert</button>

                <div class="link-group">
                    <a href="/search" class="search-btn">Search</a>
                </div>
                <div class="results-group">
                    <span id="results"></span>
                </div>
            </section>
        </div>
    </form>
</body>





    <script>
        $('#insertForm').submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: '/api/bst/insert',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#results').html("<div>Inserted: " + JSON.stringify(response) + "</div>");
                },
                error: function(xhr) {
                    $('#results').html('<div class="alert alert-danger text-center">Error inserting data.</div>');
                }
            });
        });
    </script>
</html>
