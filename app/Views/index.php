<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5000">
        <h1 class="mb-4">User Management</h1>

        <!-- User Listing Table -->
        <div class="mb-4">
            <h2>User List</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Age</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example User Data -->
                    <?php foreach ($datas as $data): ?>
                    <tr>
                            <td><?php echo htmlspecialchars($data['id']); ?></td>
                            <td><?php echo htmlspecialchars($data['name']); ?></td>
                            <td><?php echo htmlspecialchars($data['email']); ?></td>
                            <td><?php echo htmlspecialchars($data['age']); ?></td>
                        <td>
                        <a href="<?php echo site_url('users/edit/'.$data['id']); ?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="<?php echo site_url('users/delete/'.$data['id']); ?>" class="btn btn-danger btn-sm">Delete</a>

                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <!-- More rows as needed -->
                </tbody>
            </table>
        </div>
    </div> <!-- Close container div -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>