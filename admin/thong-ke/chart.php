<div class="chartCanvas">
    <canvas id="myChart"></canvas>
</div>

<a href="./" class="btn btn-outline-primary btn-sm mt-2">Quay lại</a>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php
$category = loai_selectAll();
?>

<?php foreach ($category as $item) {
    $array[] = $item['ten_loai_hang'];

    $id = $item['ma_loai_hang'];
    $quantity = count(hang_selectByLoaiHang($id));
    $arrayCount[] = $quantity;
}

$string = join('", "', $array);
$value = '["' . $string . '"]';

$json = json_encode($value);
$labels = json_decode($json);

////////////////////////////////////
$string1 = join('", "', $arrayCount);
$value1 = '["' . $string1 . '"]';

$json1 = json_encode($value1);
$quantity = json_decode($json1);
?>

<script>
    const ctx = document.getElementById('myChart');
    const lables = <?php echo $labels ?>;
    const quantity = <?php echo $quantity ?>;

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: lables,
            datasets: [{
                label: 'Quantity: ',
                data: quantity,
                borderWidth: 1,
            }],
        },
        options: {
            plugins: {
                legend: {
                    position: 'right',
                    labels: {
                        font: {
                            size: 14,
                        }
                    }
                }
            }
        }
    });
</script>