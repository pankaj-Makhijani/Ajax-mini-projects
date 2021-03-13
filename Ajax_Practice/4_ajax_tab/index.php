<?php
include('db.php');
$sql = "select id,title,data from page";
$stmt = $con->prepare($sql);
$stmt->execute();
$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax Tabs</title>
    <style>
        #tabs {
            padding: 0px;
            margin: 0px;
            list-style: none;
        }

        #tabs li {
            float: left;
            background-color: black;
            border: 1px solid #fff;
            padding: 10px;
        }

        #tabs li a {
            color: blanchedalmond;
            font-family: Arial, Helvetica, sans-serif;
            text-decoration: none;
        }

        .tabs_content {
            border: 1px solid #000;
            width: 80%;
        }

        .clear {
            clear: both;
            padding: 10px;
        }

        #tabs_about {
            display: none;
        }

        #tabs_contact {
            display: none;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <ul id="tabs">
        <?php
        foreach ($arr as $list) {
        ?>
            <li>
                <a href="javascript:void(0)" onclick="tabs_click('<?php echo $list['id'] ?>')" id="<?php echo $list['id'] ?>_click">
                    <?php echo $list['title'] ?>
                </a>
            </li>
        <?php } ?>
    </ul>
    <div class="clear"></div> 
    <div class="tabs_content">
        <?php echo $arr['0']['data']; ?>
    </div>
    <script>
        function tabs_click(type) {
            jQuery('#tabs li a').css('text-decoration', 'none');
            jQuery('#'+type+'_click').css("text-decoration", "underline");
            jQuery.ajax({
                url:'get_data.php',
                type:'POST',
                data:'id='+type,
                success:function(data) {
                    jQuery('.tabs_content').html(data);
                }
            });
        }
    </script>
</body>

</html>