<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Automated Catalogue Card</title>
    <link rel="shortcut icon" href="https://www.du.ac.bd/fontView/assets/img/favicon.ico" type="image/x-icon">

    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            #card_form * {
                visibility: hidden;
            }
            #print_card, #print_card * {
                visibility: visible;
            }

        }
    </style>
</head>
<body>

<?php

function numberToRomanRepresentation($number) {
    $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
    $returnValue = '';
    while ($number > 0) {
        foreach ($map as $roman => $int) {
            if($number >= $int) {
                $number -= $int;
                $returnValue .= $roman;
                break;
            }
        }
    }
    return $returnValue;
}
?>

<div class="container">
    <div class="row d-flex justify-content-center mt-3">
        <div class="col-md-6" id="card_form">
            <div class="card">
                <div class="card-header bg-dark"><h3 class="text-light">Bibliographical Information</h3></div>
                <div class="card-body">
                    <form action="index.php" method="post">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" value="wings of Fire">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Call Number</label>
                                <input type="text" class="form-control" name="call_number" value="0.233">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Author</label>
                                <input type="text" class="form-control" name="author" value="A P J Abdul Kalam">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">Edition</label>
                                <input type="text" class="form-control" name="edition" value="1st">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Place of Publication</label>
                                <input type="text" class="form-control" name="place_of_publication" value="Chennai">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Publisher</label>
                                <input type="text" class="form-control" name="publisher" value="Novena Offset Printing CO">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Year of Publication</label>
                                <input type="text" class="form-control" name="year_of_publication" value="2002">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Total Initial Pages</label>
                                <input type="text" class="form-control" name="initial_page" value="16">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Total Pages</label>
                                <input type="text" class="form-control" name="total_pages" value="180">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Ills, Figs, Tabs etc.</label>
                                <input type="text" class="form-control" name="after_pages" value="ills., figs., tabs.">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Size (cm)</label>
                                <input type="text" class="form-control" name="size" value="20">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Includes Bibliography</label>
                                <select name="include_bibliography" class="form-control" id="">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Includes Index</label>
                                <select name="include_index" class="form-control" id="">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">ISBN</label>
                                <input type="text" class="form-control" name="isbn" value="8173711461">
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <input type="submit" name="submit" value="Submit" class="btn btn-info btn-lg">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-dark">
                    <h3 class="text-light d-inline">Your Card</h3>
                    <?php if(isset($_POST['submit']) AND isset($_POST['submit']) == 'Submit'){ ?>
                    <a class="float-right text-light" onclick="window.print()" style="cursor: pointer"><i class="fa fa-print"></i></a>
                    <?php } ?>
                </div>
                <div class="card-body"  id="print_card">
                    <?php
                    if(isset($_POST['submit']) AND isset($_POST['submit']) == 'Submit'){
                        $title = $_POST['title'];
                        $call_number = $_POST['call_number'];
                        $author = $_POST['author'];
                        $edition = $_POST['edition'];
                        $place_of_publication = $_POST['place_of_publication'];
                        $publisher = $_POST['publisher'];
                        $year_of_publication = $_POST['year_of_publication'];
                        $initial_page = $_POST['initial_page'];
                        $after_pages = $_POST['after_pages'];
                        $total_pages = $_POST['total_pages'];
                        $size = $_POST['size'];
                        $include_bibliography = $_POST['include_bibliography'];
                        $include_index = $_POST['include_index'];
                        $isbn = $_POST['isbn'];
                        $author_arr = explode(' ', $author);
                        $last_name = array_pop($author_arr);
                        $author_mark = mb_substr($last_name, 0, 2).substr($title, 0, 1);
                    ?>
                    <table class="table table-borderless w-100" style="border: 1px solid #333">
                        <tr style="height: 80px; border-bottom: 1px solid #333;">
                            <td class="pb-0" style="width: 60px !important; vertical-align: bottom; border-right: 1px solid #333; text-align: center" >
                                <p class="m-0"><?php echo $call_number; ?></p>
                                <p class="text-uppercase m-0"><?php echo $author_mark; ?></p>
                            </td>
                            <td class="pb-0 px-0 text-center text-uppercase" style="width: 60px; vertical-align: bottom !important; border-right: 1px solid #333;">
                                <?php echo $last_name; ?>
                            </td>
                            <td class="pb-0 pl-0" style="vertical-align: bottom !important;">
                                , <?php echo preg_replace('/\W\w+\s*(\W*)$/', '$1', $author);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="25" style="border-right: 1px solid #333"></td>
                            <td rowspan="25" style="border-right: 1px solid #333;"></td>
                            <td style="height: 200px;">
                                <?php echo $title."/by ". $author.".-- $edition ed.-- $place_of_publication: $publisher, $year_of_publication." ?>
                                <br><br>
                                <?php echo "(".numberToRomanRepresentation($initial_page)."), $total_pages p.: $after_pages; $size cm."; ?>
                                <br>
                                <br>
                                <?php
                                if($include_bibliography == '1'){
                                    echo '<p class="m-0">Includes Bibliography.</p>';
                                }

                                if($include_index == '1'){
                                    echo '<p class="m-0">Includes Index.</p>';
                                }
                                ?>
                                <br>
                                <p class="mb-0">ISBN: <?php echo $isbn; ?></p>

                            </td>
                        </tr>
                    </table>
                    <?php }else{ ?>
                        <p class="text-center">No card found!</p>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card-footer bg-dark py-0">
                <p class="text-center text-light mb-0 pb-1">&copy; Design & Developed by <a href="https://facebook.com/devdict" target="_blank">DEVDICT</a></p>
            </div>
        </div>
    </div>
</div>

</body>
</html>