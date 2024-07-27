<?php session_start();

include("connection.php");

$id = $_GET['id'];

$sql = "SELECT * FROM admission WHERE id = '$id'";

if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>



            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Admission Form</title>

                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

                <style>
                    /* styles.css */
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f4;
                        margin: 0;
                        padding: 0;
                    }

                    .form-container {
                        max-width: 600px;
                        margin: 50px auto;
                        padding: 20px;
                        background: #fff;
                        border-radius: 8px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }

                    h1 {
                        text-align: center;
                        color: #333;
                    }

                    form {
                        display: flex;
                        flex-direction: column;
                    }

                    fieldset {
                        border: 1px solid #ddd;
                        margin-bottom: 20px;
                        padding: 15px;
                        border-radius: 4px;
                    }

                    legend {
                        font-weight: bold;
                        color: #333;
                    }

                    label {
                        margin-bottom: 5px;
                        color: #555;
                    }

                    input,
                    select,
                    textarea {
                        margin-bottom: 15px;
                        padding: 10px;
                        border: 1px solid #ddd;
                        border-radius: 4px;
                        width: 100%;
                    }

                    button {
                        padding: 10px 20px;
                        background: #007bff;
                        border: none;
                        border-radius: 4px;
                        color: white;
                        font-size: 16px;
                        cursor: pointer;
                    }

                    button:hover {
                        background: #0056b3;
                    }

                    .confirmation-label {
                        float: right;
                        width: 93%;
                    }

                    .confirmation-input {
                        width: 3%;
                        float: left;
                    }

                    .required {
                        display: block;
                    }
                </style>
            </head>

            <body>


                <?php

                if (isset($_SESSION['success'])) {
                    echo ($_SESSION['success']);
                    unset($_SESSION['success']);

                    // echo '<h6>'.($_SESSION['success'].'</h6>');
                }

                ?>

                <div class="form-container">
                    <h1>Admission Form</h1>
                    <form action="update.php" method="POST">
                        <!-- Personal Information Section -->
                        <fieldset>
                            <legend>Personal Information</legend>

                            <input type="hidden" name="id" value="<?= $id ?>">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" value="<?= $row['name'] ?>">

                            <div class="required">
                                <?php
                                if (isset($_SESSION['name_err'])) {
                                    echo '<h6>' . $_SESSION['name_err'] . '</h6>';
                                    unset($_SESSION['name_err']);
                                }
                                ?>
                            </div>

                            <label for="dob">Date of Birth:</label>
                            <input type="date" id="dob" name="dob" value="<?= $row['dob']?>">



                            <div class="required">
                                <?php
                                if (isset($_SESSION['dob_err'])) {
                                    echo '<h6>' . $_SESSION['dob_err'] . '</h6>';
                                    unset($_SESSION['dob_err']);
                                }
                                ?>
                            </div>

                            <label for="gender">Gender:</label>
                            <select id="gender" name="gender">
                                <option value="" <?php
                                                    if ($row['gender'] == '') {
                                                        echo 'selected';
                                                    }  ?>>Select...</option>
                                <option value="male" <?php
                                                    if ($row['gender'] == 'male') {
                                                        echo 'selected';
                                                    }  ?>>Male</option>
                                <option value="female" <?php
                                                    if ($row['gender'] == 'female') {
                                                        echo 'selected';
                                                    }  ?>>Female</option>
                                <option value="other" <?php
                                                    if ($row['gender'] == 'other') {
                                                        echo 'selected';
                                                    }  ?>>Other</option>
                            </select>

                            <div class="required">
                                <?php
                                if (isset($_SESSION['gender_err'])) {
                                    echo '<h6>' . $_SESSION['gender_err'] . '</h6>';
                                    unset($_SESSION['gender_err']);
                                }
                                ?>
                            </div>
                        </fieldset>

                        <!-- Contact Information Section -->
                        <fieldset>
                            <legend>Contact Information</legend>
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value=" <?= $row['email'] ?>">

                            <div class="required">
                                <?php
                                if (isset($_SESSION['email_err'])) {
                                    echo '<h6>' . $_SESSION['email_err'] . '</h6>';
                                    unset($_SESSION['email_err']);
                                }
                                ?>
                            </div>

                            <label for="phone">Phone Number:</label>
                            <input type="tel" id="phone" name="phone" value=" <?= $row['phone'] ?>">

                            <div class="required">
                                <?php
                                if (isset($_SESSION['phone_err'])) {
                                    echo '<h6>' . $_SESSION['phone_err'] . '</h6>';
                                    unset($_SESSION['phone_err']);
                                }
                                ?>
                            </div>

                            <label for="address">Address:</label>
                            <textarea id="address" name="address" rows="4"><?= $row['address'] ?></textarea>

                            <div class="required">
                                <?php
                                if (isset($_SESSION['address_err'])) {
                                    echo '<h6>' . $_SESSION['address_err'] . '</h6>';
                                    unset($_SESSION['address_err']);
                                }
                                ?>
                            </div>
                        </fieldset>

                        <!-- Academic Background Section -->
                        <!-- <fieldset>
                            <legend>Academic Background</legend>
                            <label for="highSchool">High School Name:</label>
                            <input type="text" id="highSchool" name="highSchool" required>
            
                            <label for="gradYear">Graduation Year:</label>
                            <input type="number" id="gradYear" name="gradYear" min="1900" max="2099" required>
            
                            <label for="gpa">GPA:</label>
                            <input type="number" id="gpa" name="gpa" step="0.01" min="0" max="4.0" required>
                        </fieldset> -->

                        <!-- Additional Information Section -->
                        <!-- <fieldset>
                            <legend>Additional Information</legend>
                            <label for="program">Program of Interest:</label>
                            <select id="program" name="program" required>
                                <option value="">Select...</option>
                                <option value="engineering">Engineering</option>
                                <option value="medicine">Medicine</option>
                                <option value="business">Business</option>
                                <option value="arts">Arts</option>
                            </select>
            
                            <label for="comments">Additional Comments:</label>
                            <textarea id="comments" name="comments" rows="4"></textarea>
                        </fieldset> -->

                        <fieldset class="confirmation">
                            <input type="checkbox" value="done" class="confirmation-input" name="confirmation" <?php
                                                                                                                if ($row['confirmation'] == 'done') {
                                                                                                                    echo 'checked';
                                                                                                                }  ?>>
                            <label for="" class="confirmation-label">I hereby confirm that all the Information provided by me is correct true and valid.</label>
                            <br><br>

                            <div class="required">
                                <?php
                                if (isset($_SESSION['confirmation_err'])) {
                                    echo '<h6>' . $_SESSION['confirmation_err'] . '</h6>';
                                    unset($_SESSION['confirmation_err']);
                                }
                                ?>
                            </div>
                        </fieldset>

                        <button type="submit">Update</button>
                    </form>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            </body>

            </html>


<?php

        }
    }
}

?>