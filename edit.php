<?php
    require('tailwind.php');
    require('connection.php');

    $res = $conn->query("SELECT * FROM users JOIN numbers ON users.id = numbers.user_id WHERE users.id = " . $_REQUEST['id']);
    $row = $res->fetch_assoc();
?>

<script>
    function addNumber(number) {
        let inputContainer = document.getElementById('input-container');
        let input = document.createElement('input');
        input.type = 'text';
        input.name = 'phone-number-' + (inputContainer.childElementCount / 2 + 1);
        input.value = number || "";
        input.setAttribute("form", "edit-form");
        input.placeholder = '123456789';
        input.className = 'p-2 rounded border mr-4 w-56';
        inputContainer.appendChild(input);

        let button = document.createElement('button');
        button.className = 'p-2 rounded cursor-pointer border w-56';
        button.innerHTML = 'Delete number -';
        inputContainer.appendChild(button);
        button.onclick = function() {
            inputContainer.removeChild(input);
            inputContainer.removeChild(button);
        }
    }
</script>

<main class="mx-auto max-w-prose my-8">
    <h1 class="text-xl mb-2">Edit record #<?php echo $_REQUEST['id']?></h1>

    <form id="edit-form" action="edit-submit.php"></form>
    <form id="delete-form" action="delete-submit.php"></form>
        
    <input type="text" name="id" form="edit-form" class="hidden" value="<?php echo $_REQUEST['id'] ?>">
    <input type="text" name="id" form="delete-form" class="hidden" value="<?php echo $_REQUEST['id'] ?>">

    <div class="flex flex-col gap-2">
        <label>
            <input type="text" name="name" form="edit-form" value="<?php echo $row['name'] ?>" class="p-2 rounded border mr-4 w-56">
            Name
        </label>
        
        <label>
            <input type="text" name="surname" form="edit-form" value="<?php echo $row['surname'] ?>" class="p-2 rounded border mr-4 w-56">
            Surname
        </label>
        
        <div id="input-container" class="grid gap-2 grid-cols-[14rem_auto]">
            <?php
                $st = $conn->prepare("SELECT * FROM numbers WHERE user_id = ?");
                $st->bind_param("i", $_REQUEST['id']);
                $st->execute();
                $res = $st->get_result();

                if ($res->num_rows > 0) {
                    while ($row = $res->fetch_assoc()) {
                        echo "<script>addNumber({$row['number']})</script>";
                    }
                }
            ?>
        </div>

        <button class="p-2 rounded cursor-pointer border w-56" onclick="addNumber()">Add number +</button>

        <div class="flex space-x-2">
            <input type="submit" form="delete-form" value="Delete" class="p-2 rounded cursor-pointer border flex-grow bg-red-50">
            <input type="submit" form="edit-form" value="Save" class="p-2 rounded cursor-pointer border flex-grow bg-green-50">
        </div>
    </div>
</main>