<?php

declare(strict_types=1);
function getTranscationFiles(string $dir): array
{
    $files = [];
    foreach (scandir($dir) as $file) {
        if (is_dir($file)) {
            continue;
        }
        $files[] = $dir . $file;
    }
    return $files;
}


function getTransactions(string $fileName, ?callable $transactionHandler = null): array
{
    if (!file_exists($fileName)) {
        trigger_error('File "' . $fileName . '" does not exist.', E_USER_ERROR);
    }

    $file = fopen($fileName, 'r');

    fgetcsv($file);

    $transactions = [];

    while (($transaction = fgetcsv($file)) !== false) {
        if ($transactionHandler !== null) {
            $transaction = $transactionHandler($transaction);
        }

        $transactions[] = $transaction;
    }

    return $transactions;
}


function extractTransactions(array $transactionRow): array
{
    [$Date, $check, $Description, $Amount] = $transactionRow;

    $Amount =  (float) str_replace(['$', ','], '', $Amount);
    return
        [
            "Date" => $Date,
            "check" => $check,
            "Discription" => $Description,
            "amount" => $Amount


        ];
}




function CalculateTotals(array $transactions):array
{
    $totals = ['newTotal' => 0, 'totalIncome' => 0, 'TotalExpenses' => 0];

    foreach ($transactions as $transaction) {
        $totals['newTotal'] += $transaction['amount'];

        if ($transaction['amount'] >= 0) {
            $totals['totalIncome'] += $transaction['amount'];
        } else {
            $totals['TotalExpenses'] += $transaction['amount'];
        }
    }
    return $totals;
}
