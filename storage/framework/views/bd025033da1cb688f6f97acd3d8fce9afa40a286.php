<tr>
    <td><?php echo $stat['Name']; ?></td>
    <td><?php echo $stat['Game']; ?></td>
    <td><?php echo $stat['User']; ?></td>
    <td><?php echo $stat['System']; ?></td>
    <td><?php echo $stat['In']; ?></td>
    <td><?php echo $stat['Out']; ?></td>
    <td><?php echo $stat['Balance']; ?></td>
    <td><?php echo $stat['Bet']; ?></td>
    <td><?php echo $stat['Win']; ?></td>
    <td><?php echo $stat['Old']; ?></td>
    <td><?php echo $stat['New']; ?></td>
    <td><?php echo $stat['IN_GAME']; ?></td>
    <td><?php echo $stat['IN_JPS']; ?></td>
    <td><?php echo $stat['IN_JPG']; ?></td>
    <td><?php echo $stat['Profit']; ?></td>
    <td><?php echo date(config('app.date_time_format'), $stat['Date']); ?></td>
</tr><?php /**PATH C:\365SPORT.com\domains\igameprovider\resources\views/backend/stat/partials/row_live_stat.blade.php ENDPATH**/ ?>