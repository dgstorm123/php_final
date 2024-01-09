<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include your CSS styles here -->
    @include('admin.admincss')
    <style>
        /* Use the same CSS styles as Add New Post page */
        .post-editor {
            width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }

        .heading {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }

        .box {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
        }

        .flex-btn {
            display: flex;
            justify-content: center;
            text-align: center;
            margin: 0 auto;
        }

        .btn {
            background-color: white;
            color: white;
            border: 2px solid black;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
    @include('admin.header')

    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation -->
        @include('admin.slidebar')
        <!-- Sidebar Navigation end -->

        <div class="page-content">
            <section class="post-editor">
                <h1 class="heading">Add New Category</h1>
                <form action="{{ route('add_category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <p>Category Name <span>*</span></p>
                    <input type="text" name="name" maxlength="100" required placeholder="Add category name" class="box">
                    <div class="flex-btn">
                        <input type="submit" value="Add Category" name="add_category" class="btn">
                    </div>
                </form>
            </section>
        </div>

        <!-- footer -->
        @include('admin.footer')
    </div>
</body>
</html>
