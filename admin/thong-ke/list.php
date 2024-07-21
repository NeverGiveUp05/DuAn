<style>
    td,
    th {
        align-content: center;
        text-align: center;
    }
</style>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col" style="font-weight: 600;">LOẠI HÀNG</th>
            <th scope="col" style="font-weight: 600;">SỐ LƯỢNG</th>
            <th scope="col" style="font-weight: 600;">GIÁ CAO NHẤT</th>
            <th scope="col" style="font-weight: 600;">GIÁ THẤP NHẤT</th>
            <th scope="col" style="font-weight: 600;">GIÁ TRUNG BÌNH</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $list = loai_selectAll();

        if (empty($list)) { ?>

            <tr>
                <td colspan="6">Hiện chưa có bản ghi nào</td>
            </tr>

            <?php  } else {
            $total = 0;
            $quantity = 0;

            foreach ($list as $item) {
                $id = $item['ma_loai_hang'];

                $count = count(hang_selectByLoaiHang($id));

                $min = hang_getMinPriceByLoaiHang($id);
                $max = hang_getMaxPriceByLoaiHang($id);
            ?>

                <tr>
                    <td><?php echo $item['ten_loai_hang'] ?></td>
                    <td><?php echo $count ?></td>
                    <td><?php echo number_format($max['don_gia'], 0, '', '.') ?></td>
                    <td><?php echo number_format($min['don_gia'], 0, '', '.') ?></td>
                    <td><?php
                        $products = hang_selectByLoaiHang($id);

                        foreach ($products as $product) {
                            $total += $product['don_gia'];
                            $quantity += 1;
                        }

                        echo number_format($total / $quantity, 0, '', '.');

                        $total = 0;
                        $quantity = 0;
                        ?></td>
                </tr>
        <?php
            }
        }

        ?>
    </tbody>
</table>

<?php if (!empty($list)) { ?>
    <a href="?chart" class="btn btn-outline-primary btn-sm mt-2">Biểu đồ</a>
<?php } ?>