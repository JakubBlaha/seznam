<?php
    require('tailwind.php');
?>

<main class="mx-auto max-w-prose my-8">
    <h1 class="text-xl mb-2">Add new record</h1>

    <form action="add-submit.php" class="flex flex-col gap-2">
        <label>
            <input type="text" name="name" placeholder="Martin" value="<?php echo $_REQUEST['name'] ?? "" ?>" class="p-2 rounded border mr-4">
            Name
        </label>

        <label>
            <input type="text" name="surname" placeholder="Davidek" value="<?php echo $_REQUEST['surname'] ?? "" ?>" class="p-2 rounded border mr-4">
            Surname
        </label>

        <label>
            <input type="text" name="phone-number" placeholder="123456789" value="<?php echo $_REQUEST['phone-number'] ?? "" ?>" class="p-2 rounded border mr-4">
            Phone number
        </label>

        <input type="submit" value="Save" class="p-2 rounded cursor-pointer border">
    </form>
</main>