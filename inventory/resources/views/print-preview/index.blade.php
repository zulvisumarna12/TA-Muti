<!-- resources/views/print-view.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print View</title>
    <style>
        @media print {
            /* Print-specific styles */
            body {
                font-family: Arial, sans-serif;
            }
            .no-print {
                display: none;
            }
            /* Add more styles as needed */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Printable View</h1>
        <!-- Your printable content here -->
        <div class="content">
            @foreach($data as $item)
                <p>{{ $item }}</p>
            @endforeach
        </div>
        <button class="no-print" onclick="window.print()">Print</button>
    </div>
</body>
</html>
