<style>
    td,
    th {
        align-content: center;
        text-align: center;
    }
</style>

<div class="table-container">
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
                    <td colspan="12">Hiện chưa có bản ghi nào</td>
                </tr>

                <?php  } else {
                foreach ($list as $item) { ?>
                    <tr>
                        <td style="width: 565px; max-width: 565px; min-width: 320px">
                            <p style="word-wrap: break-word; overflow-wrap: break-word; overflow: hidden; -webkit-line-clamp: 2; -webkit-box-orient: vertical; display: -webkit-box; margin-bottom: 0"><?php echo $item['ten_hang_hoa'] ?></p>
                        </td>
                        <td style="min-width: 140px;"><?php echo count(comment_getAllByLoaiHang($item['ma_hang_hoa'])) ?></td>
                        <td style="min-width: 130px;"><?php
                                                        $newDate = '';

                                                        $comments = (comment_getAllByLoaiHang($item['ma_hang_hoa']));

                                                        foreach ($comments as $comment) {
                                                            if ($comment['ngay_dang'] > $newDate) {
                                                                $newDate = $comment['ngay_dang'];
                                                            }
                                                        }

                                                        echo $newDate;
                                                        ?></td>

                        <td style="min-width: 130px;"><?php
                                                        $comments = (comment_getAllByLoaiHang($item['ma_hang_hoa']));

                                                        foreach ($comments as $comment) {
                                                            if ($comment['ngay_dang'] < $newDate) {
                                                                $newDate = $comment['ngay_dang'];
                                                            }
                                                        }

                                                        echo $newDate;
                                                        ?></td>

                        <td><a style="min-width: 70px;" class="btn btn-outline-primary btn-sm" href="?detail&id=<?php echo $item['ma_hang_hoa'] ?>">Chi tiết</a></td>
                    </tr>
            <?php }
            } ?>

        </tbody>
    </table>
</div>