<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transcations</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Date</th>
        <th scope="col">Check</th>
        <th scope="col">Description</th>
        <th scope="col">Amount</th>
      </tr>
    </thead>
    <tbody>

      <?php foreach ($transctions as $transaction) { ?>
        <tr>

          <td><?= $transaction['Date'] ?> </td>
          <td><?= $transaction['check'] ?></td>
          <td><?= $transaction['Discription'] ?></td>
          <?php if ($transaction['amount'] < 0) {  ?>
            <td> <span class="text-success"><?= formater($transaction['amount']) ?> </span></td>

          <?php }else{ ?>
          <td> <?= formater($transaction['amount']) ?> </td>
          <?php } ?>
        </tr>
      <?php } ?>

    </tbody>
    <tfoot>

      <tr>
        <th>Total Income:</th>
        <td colspan="3"><?= formater($totals['totalIncome']) ?></td>
      </tr>
      <tr>
        <th>Total Expenses:</th>
        <td colspan="3"><?= formater($totals['TotalExpenses']) ?></td>
      </tr>
      <tr>
        <th>New Total:</th>
        <td><?= formater($totals['newTotal']) ?></td>


      </tr>



    </tfoot>



  </table>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>