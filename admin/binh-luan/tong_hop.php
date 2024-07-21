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
            <th scope="col" style="font-weight: 600;">HÀNG HÓA</th>
            <th scope="col" style="font-weight: 600;">SỐ BÌNH LUẬN</th>
            <th scope="col" style="font-weight: 600;">MỚI NHẤT</th>
            <th scope="col" style="font-weight: 600;">CŨ NHẤT</th>
            <th scope="col" style="font-weight: 600;"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $list = hang_selectAll();

        if (empty($list)) { ?>

            <tr>
                <td colspan="5">Hiện chưa có bản ghi nào</td>
            </tr>

            <?php  } else {
            foreach ($list as $item) { ?>
                <tr>
                    <td style="width: 565px; max-width: 565px; ">
                        <p style="word-wrap: break-word; overflow-wrap: break-word; overflow: hidden; -webkit-line-clamp: 2; -webkit-box-orient: vertical; display: -webkit-box; margin-bottom: 0"><?php echo $item['ten_hang_hoa'] ?></p>
                    </td>
                    <td><?php echo count(comment_getAllByLoaiHang($item['ma_hang_hoa'])) ?></td>
                    <td><?php
                        $newDate = '';

                        $comments = (comment_getAllByLoaiHang($item['ma_hang_hoa']));

                        foreach ($comments as $comment) {
                            if ($comment['ngay_dang'] > $newDate) {
                                $newDate = $comment['ngay_dang'];
                            }
                        }

                        echo $newDate;
                        ?></td>

                    <td><?php
                        $comments = (comment_getAllByLoaiHang($item['ma_hang_hoa']));

                        foreach ($comments as $comment) {
                            if ($comment['ngay_dang'] < $newDate) {
                                $newDate = $comment['ngay_dang'];
                            }
                        }

                        echo $newDate;
                        ?></td>

                    <td><a class="btn btn-outline-primary btn-sm" href="?detail&id=<?php echo $item['ma_hang_hoa'] ?>">Chi tiết</a></td>
                </tr>
        <?php }
        } ?>

    </tbody>
</table>