    <div style="overflow: auto;">
            <table class="searchbar scrollmenu" style=" background-color: rgba(2,2,2,.5); ">
                <tr>
                    <?php
                    $url = htmlspecialchars($_SERVER["PHP_SELF"]);
                    echo "<form method='post' action='$url'>";
                    for ($i = 0; $i < count($columns); $i++) {
                        echo "<td><span style='color:white;font-weight:bold; font-size:20px; padding:5px;'>" . $columns[$i] . " "
                        . "<br><select name='conditiontype$i' class='btn btn-dark'>"
                        . " <option value='like'>Similar to</option>"
                        . " <option value='='> Same as</option>"
                        . " <option value='not like'>Not Like</option></select></span> "
                        . "<input type='text' name='" . $columns[$i] . "' class='form-control'>"
                        . "<select name='operatoroc$i' class='btn btn-dark'>"
                        . " <option value='or'>Right is optional</option>"
                        . " <option value='and'>Right is compulsary</optional>"
                        . "</select>"
                        . "</td>";
                    }
                    ?>
                    <td><a href="<?php echo $url; ?>"> <span style='color:white;font-weight:bold; font-size:20px; padding:5px;'>&InvisibleTimes;All Record</span></a></td>
                    <td><button class="btn btn-dark btn-large ml-2">Filter</button></td>
                    </form>
                </tr>
            </table>
        </div>