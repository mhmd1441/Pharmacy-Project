<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Medicine Detail</title>
    <style>
        .medicine-detail {
            display: flex;
            gap: 20px;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        .medicine-img img {
            max-width: 300px;
            height: auto;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .medicine-info {
            flex: 1;
        }

        .price {
            font-size: 1.5em;
            color: #333;
            margin: 10px 0;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 1em;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <div class="medicine-detail">
        <div class="medicine-img">
            <img src="path_to_medicine_image.jpg" alt="Medicine Name" />
            <img src="https://via.placeholder.com/300x300" alt="Medicine Image" />
        </div>
        <div class="medicine-info">
            <h1>Medicine Name Here</h1>
            <p class="description">Description of the medicine goes here.</p>
            <div class="price">$0.00</div>

            <form action="add_to_cart_url" method="POST">
                <button type="submit" class="btn-primary">Add to Cart</button>
            </form>
        </div>
    </div>
</body>

</html>