<?php
    require('tailwind.php');
    require('connection.php');

    $res = $conn->query("SELECT * FROM users WHERE id = " . $_REQUEST['id']);
    $row = $res->fetch_assoc();
?>

<main class="mx-auto max-w-prose my-8">
    <h1 class="text-xl mb-2">Edit record #<?php echo $_REQUEST['id']?></h1>

    <form id="edit-form" action="edit-submit.php"></form>
    <form id="delete-form" action="delete-submit.php"></form>
        
    <input type="text" name="id" form="edit-form" class="hidden" value="<?php echo $_REQUEST['id'] ?>">
    <input type="text" name="id" form="delete-form" class="hidden" value="<?php echo $_REQUEST['id'] ?>">

    <div class="flex flex-col gap-2">
        <label>
            <input type="text" name="name" form="edit-form" value="<?php echo $row['name'] ?>" class="p-2 rounded border mr-4">
            Name
        </label>

        <label>
            <input type="text" name="surname" form="edit-form" value="<?php echo $row['surname'] ?>" class="p-2 rounded border mr-4">
            Surname
        </label>

        <label>
            <input type="text" name="phone-number" form="edit-form" value="<?php echo $row['phone_number'] ?>" class="p-2 rounded border mr-4">
            Phone number
        </label>

        <div class="flex space-x-2">
            <input type="submit" form="delete-form" value="Delete" class="p-2 rounded cursor-pointer border flex-grow bg-red-50">
            <input type="submit" form="edit-form" value="Save" class="p-2 rounded cursor-pointer border flex-grow bg-green-50">
        </div>
    </div>
</main>