<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AcademiaPro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class ="max-w-3xl mx-auto p-4">
        <h1 class="text-2xl font-bold text-center text-blue-600">Academia Pro</h1>
        <!-- Form to add a new student -->
         <form action ="insert.php" method="POST" class = "mb-8">
            <div class="mb-4">
                <label for="name" class ="block text-lg font-medium">Name</label></label>
                <input type="text" name="name" id="name" class="mt-1 block w-full px-4 py-2 border border gray-300 rounded-md">
            </div>
            <div class="mb-4">
            <label for="age" class="block text-lg font-medium">Age</label>
            <input type="number" name="age" id="age" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md">
            <div class="mb-4">
            <label for="gender" class="block text-lg font-medium">Gender</label>
            <select name="gender" id="gender" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-lg font-medium">Email</label>
            <input type="email" name="email" id="email" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
            <label for="phone" class="block text-lg font-medium">Phone</label>
            <input type="text" name="phone" id="phone" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
            <label for="address" class="block text-lg font-medium">Address</label>
            <textarea name="address" id="address" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md"></textarea>
        </div>
            </div>
            <button type="submit" name="insert" class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Add Student</button>
         </form>

        <!-- Display the list of students -->
        <h2 class="text-2xl font-bold mb-4">Student List</h2>

        <?php
        include('db.php');

        $sql = "SELECT * FROM students";
        $result = $conn ->query($sql);

        if ($result ->num_rows > 0) {
            echo "<table class='table-auto w-full border-collapse border border-gray-300'>
            <thead>
                <tr>
                    <th class='border px-4 py-2'>ID</th>
                    <th class='border px-4 py-2'>Name</th>
                    <th class='border px-4 py-2'>Age</th>
                    <th class='border px-4 py-2'>Gender</th>
                    <th class='border px-4 py-2'>Email</th>
                    <th class='border px-4 py-2'>Phone</th>
                    <th class='border px-4 py-2'>Actions</th>
                </tr>
            </thead>
            <tbody>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td class='border px-4 py-2'>" . $row['id'] . "</td>
                <td class='border px-4 py-2'>" . $row['name'] . "</td>
                <td class='border px-4 py-2'>" . $row['age'] . "</td>
                <td class='border px-4 py-2'>" . $row['gender'] . "</td>
                <td class='border px-4 py-2'>" . $row['email'] . "</td>
                <td class='border px-4 py-2'>" . $row['phone'] . "</td>
                <td class='border px-4 py-2'>
                    <a href='update.php?id=" . $row['id'] . "' class='text-blue-500'>Edit</a> | 
                    <a href='delete.php?id=" . $row['id'] . "' class='text-red-500'>Delete</a>
                </td>
              </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "<p>No students found.</p>";
}

$conn->close();
?>


        ?>

    </div>
    
</body>
</html>