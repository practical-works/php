<?php
require "utils.php";
$missing = [];
$errors = [];
$is_suspect = is_suspect($_GET, "/content-type:|cc:|bcc:/i");
if (!$is_suspect) :
    if ($_GET) :
        $required = [ "name", "comment" ];
        $expected = array_merge($required, [ "email" ]);
        foreach ($_GET as $key => $value) {
            // Trim Space from input value before checking
            $value = is_array($value) ? $value : trim($value);
            // In case of required, checks if input value exists
            if (!$value && in_array($key, $required))
                // required value is missing
                $missing[] = $key;
            // create a dynamic variable with same name as key content
            $$key = is_array($value) ? $value : htmlentities($value);
        }
        if ($email) {
            $email_is_valid = filter_input(INPUT_GET, "email", FILTER_VALIDATE_EMAIL);
            if (!$email_is_valid) {
                $errors[] = "email";
            }
        }
        if (!$missing && !$errors) {

        }
    endif;
endif;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Contact Form</title>
</head>
<body>
    <form method="get" action="<?= $_SERVER["PHP_SELF"] ?>" novalidate>
        <?php if($errors || $missing) : ?>
        <span class="warning"> <img src="warning.png" width="32px" alt="warning"> Warning<br>
            <?php
                if($errors) {
                    echo "Errors in : " . implode(", ", $errors) . "<br>";
                }
                if ($missing) {
                    echo "Missing : " . implode(", ", $missing) . "<br>";
                }
            ?>
        </span>
        <?php endif; if ($_GET) : ?>
        <a id="init-link" href="form.php">Initialize</a>
        <?php endif; if($is_suspect): ?>
        <span class="warning"> <img src="warning.png" width="32px" alt="warning"> WTF u doing bitch ?</span>
        <?php endif; ?>
        <p>
            <label for="name">Name</label>
            <?php if ($missing && in_array("name", $missing)) : ?>
                <span class="warning min">Your name is required.</span>
            <?php endif; ?>
            <input type="text" id="name" name="name" value="<?php if(isset($name)) echo $name; ?>">
        </p>
        <p>
            <label for="email">Email</label>
            <?php if ($errors && in_array("email", $errors)) : ?>
                <span class="warning min">Your email is invalid.</span>
            <?php endif; ?>
            <input type="email" id="email" name="email" value="<?php if(isset($email)) echo $email; ?>">
        </p>
        <p>
            <label for="comment">Comment</label>
            <?php if ($missing && in_array("comment", $missing)) : ?>
                <span class="warning min">Write your comment to send.</span>
            <?php endif; ?>
            <textarea id="comment" name="comment"><?php if(isset($comment)) echo $comment; ?></textarea>
        </p>
        <p>
            <input type="submit" value="Send">
        </p>
    </form>
</body>
</html>