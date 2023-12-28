<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <title>Form Sample 1</title>
</head>

<body>
    <section class="section">
        <?php
        $name = $website = $position = $experience = $estatus = $comments = "";

        function val($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
        <form name="employment" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="mb-6">
            <h2 class="has-text-weight-bold is-size-5">Employment Application</h2>
            <table width="600" border="0" cellspacing="1" cellpadding="1">
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td class="level-right mr-3 has-text-weight-medium">Name</td>
                    <td><input type="text" name="name" maxlength="50" />
                    </td>
                </tr>
                <tr>
                    <td class="level-right mr-3 has-text-weight-medium">Website</td>
                    <td><input type="text" name="website" maxlength="50" /></td>
                </tr>
                <tr>
                    <td class="level-right mr-3 has-text-weight-medium">Position</td>
                    <td>
                        <select name="position">
                            <option value="Accountant">Accountant</option>
                            <option value="Administrator">Administrator</option>
                            <option value="DBAdmin">DB Admin</option>
                            <option value="Developer">Developer</option>
                            <option value="Designer">Graphic Designer</option>
                            <option value="Receptionist">Receptionist</option>
                            <option value="Supervisor">Supervisor</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="level-right mr-3 has-text-weight-medium">Experience Level</td>
                    <td>
                        <select name="experience">
                            <option value="Entry Level">Entry Level</option>
                            <option value="Some Experience">Some Experience</option>
                            <option value="Very Experienced">Very Experienced</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="level-right mr-3 has-text-weight-medium">Employment Status</td>
                    <td>
                        <span><input type="radio" name="estatus" value="Employed" checked /> Employed</span>
                        <span class="ml-3"><input type="radio" name="estatus" value="Unemployed" /> Unemployed</span>
                        <span class="ml-3"><input type="radio" name="estatus" value="Student" /> Student</span>
                    </td>
                </tr>
                <tr>
                    <td class="level-right mr-3 has-text-weight-medium">Additional Comments</td>
                    <td>
                        <textarea name="comments" cols="45" rows="5"></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="Submit" />
                        <input type="reset" name="reset" value="Reset" />
                    </td>
                </tr>
            </table>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                echo "<span class='error mt-4 ml-auto mr-auto'>Error: First Name required</span>";
            } elseif (!preg_match("/^[a-zA-Z ]*$/", $_POST["name"])) {

                // Validation: Name only contains letters
                echo "<span class='error mt-4 ml-auto mr-auto'>Error: Name can only contain letters</span>";
            } elseif (empty($_POST["website"])) {
                echo "<span class='error mt-4 ml-auto mr-auto'>Error: Website is required</span>";
            } elseif (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[a-z0-9+&@#\/%?=~_|!:,.;]*[a-z0-9+&@#\/%=~_|]/i", $_POST["website"])) {
                // Validation: Website must be in correct format
                echo "<span class='error mt-4 ml-auto mr-auto'>Error: Website is in wrong format</span>";
            } else {
                $name = val($_POST["name"]);
                $website = val($_POST["website"]);
                $position = val($_POST["position"]);
                $experience = val($_POST["experience"]);
                $estatus = val($_POST["estatus"]);
                $comments = val($_POST["comments"]);
            }
        }

        echo "<div class='ml-7'>";
        echo "<p class='title is-size-6 mt-4'>User Input</p>";
        echo "<p><span class='has-text-weight-medium mr-5'>Name:</span><span>" . $name . "</span></p>";
        echo "<p><span class='has-text-weight-medium mr-5'>Website:</span><span>" . $website . "</span></p>";
        echo "<p><span class='has-text-weight-medium mr-5'>Position:</span><span>" . $position . "</span></p>";
        echo "<p><span class='has-text-weight-medium mr-5'>Experience:</span><span>" . $experience . "</span></p>";
        echo "<p><span class='has-text-weight-medium mr-5'>Emplmnt. Status:</span><span>" . $estatus . "</span></p>";
        echo "<p><span class='has-text-weight-medium mr-5'>Comments:</span><span>" . $comments . "</span></p>";
        echo "</div>";
    ?>
    </section>

</body>

</html>