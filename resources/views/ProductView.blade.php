<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #111;
            overflow: hidden;
        }

        .card {
            width: 60%;
            position: relative;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            overflow: hidden;
            border: none;
            animation: fadeIn 0.8s ease-in-out;
        }

        .card-header {
            background: linear-gradient(45deg, #ff0000, #ff7300, #ffeb00, #00ff26, #0095ff, #a200ff);
            background-size: 300% 300%;
            animation: rgbAnimation 5s infinite linear;
            border-radius: 15px 15px 0 0;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
        }

        @keyframes rgbAnimation {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .product-image-container {
            perspective: 800px;
            display: inline-block;
        }

        .product-image {
            width: 250px;
            height: auto;
            border-radius: 10px;
            transition: transform 0.2s ease-out, box-shadow 0.2s ease-in-out;
            box-shadow: 0px 10px 20px rgba(255, 255, 255, 0.2);
            will-change: transform;
        }

        .product-image:hover {
            box-shadow: 0px 15px 30px rgba(255, 255, 255, 0.5);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card shadow-lg">
            <div class="card-header text-white text-center">
                <h3 class="mb-0">Product Details</h3>
            </div>
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-4 text-center">
                        <div class="product-image-container">
                            <img id="product-image" src="{{ asset('storage/' . $product->product_image) }}"
                                onerror="this.onerror=null;this.src='https:://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/BMW_M4_G82_1X7A0065.jpg/1200px-BMW_M4_G82_1X7A0065.jpg';"
                                class="product-image img-fluid img-thumbnail">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h4 class="fw-bold">{{ $product->product_name }}</h4>
                        <p><strong>Title:</strong> {{ $product->title }}</p>
                        <p><strong>Description:</strong> {{ $product->product_description }}</p>
                        <p><strong>Stock:</strong> {{ $product->product_stock }}</p>
                        <p><strong>Price:</strong> ${{ $product->product_price }}</p>
                        <p><strong>Sale Price:</strong> ${{ $product->product_sale_price }}</p>
                        <p><strong>Color:</strong> {{ $product->product_color }}</p>
                        <p><strong>Status:</strong>
                            <span class="badge {{ $product->product_active ? 'bg-success' : 'bg-danger' }}">
                                {{ $product->product_active ? 'Active' : 'Inactive' }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const image = document.getElementById("product-image");

        image.addEventListener("mousemove", (event) => {
            const {
                offsetX,
                offsetY
            } = event;
            const width = image.clientWidth;
            const height = image.clientHeight;

            const rotateX = ((offsetY / height) - 0.5) * 30; // Tilt based on Y-axis
            const rotateY = ((offsetX / width) - 0.5) * 30; // Tilt based on X-axis

            image.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.05)`;
        });

        image.addEventListener("mouseleave", () => {
            image.style.transform = "rotateX(0deg) rotateY(0deg) scale(1)";
        });
    </script>
</body>

</html>
