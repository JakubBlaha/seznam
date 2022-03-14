<?php
    require("connection.php");
    require("tailwind.php");
    require_once("info-banner.php");

    if (isset($_REQUEST['query'])) {
        $query = $_REQUEST['query'];
    } else {
        $query = "";
    }
?>

<main class="mx-auto max-w-prose my-8">
    <div class="flex space-x-1">
        <form action="/add.php" class="inline-block">
            <input type="submit" value="Add new +" class="p-2 rounded cursor-pointer border">
        </form>

        <form action="index.php" class="flex flex-grow space-x-1">
            <input type="text" name="query" class="p-2 rounded cursor-pointer border flex-grow" value="<?php echo $query ?>" placeholder="Type in name, surname or phone number">
            <input type="submit" value="Search" class="p-2 rounded cursor-pointer border">
        </form>
    </div>

    <?php
        if ($query) {
            $param = "%" . $query . "%";
            $st = $conn->prepare("SELECT u.id, u.name, u.surname, n.number FROM users u RIGHT JOIN numbers n ON u.id = n.user_id WHERE name LIKE ? OR surname LIKE ? OR n.number LIKE ?");
            $st->bind_param("sss", $param, $param, $param);
            $st->execute();

            $res = $st->get_result();
        } else {
            $st = $conn->prepare("SELECT users.id, users.name, users.surname, numbers.number FROM users RIGHT JOIN numbers ON users.id = numbers.user_id");
            $st->execute();

            $res = $st->get_result();
        }

        if ($res->num_rows > 0) {
            // output data of each row
            while($row = $res->fetch_assoc()) {
            echo "<a class='odd:bg-gray-100 border p-2 flex' href='/edit.php?id=".$row['id']."'><div class='flex-grow'>" . $row["name"]. " " . $row["surname"]. "</div><div>".$row['number']."</div></a>";
            }
        } else {
            echo get_info_banner("No results found.");
        }
    ?>
</main>
