<?php $this->load->view("admin/admin/head")?>
<div class="content" xmlns="http://www.w3.org/1999/html">
<div class="row">
    <div class="col-xs-12">
        <div id="alerts"></div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Bảng Thông Tin Quản Trị Viên</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="dataTables_length" id="example1_length"><label>
                            <form action="<?php echo base_url("admin/admin/")?>" method="post">Hiển Thị
                                <select name="per_page" aria-controls="example1" class="form-control input-sm"
                                        id="change_num_record">
                                    <?php for($i = 5; $i <= $total; $i= $i + 5) :?>
                                        <option value="<?php echo $i?>" <?php echo $per_page == $i ? "selected" : ""?>>
                                            <?php echo $i?>
                                        </option>
                                        <option value="<?php echo $total?>" <?php echo $per_page == $total ? "selected" : ""?>>
                                            <?php echo $total?>
                                        </option>
                                    <?php endfor; ?>
                                </select> Bản Ghi</label></div>

                    </div>
                    <div class="col-sm-6">
                        <div class="dataTables_filter">
                            <label>
                                <select name="type" class="form-control">
                                    <option value="">Tìm kiếm theo</option>
                                    <option value="username">Username</option>
                                    <option value="email">Email</option>
                                    <option value="phone">Phone</option>
                                </select>
                                <label>
                                    <input class="form-control input-sm" placeholder="Tìm Kiếm"  type="search" name="search">
                                </label>
                            </label>
                        </div>
                    </div>
                    </form>
                    <div class="col-sm-3 dataTables_filter">
                        <a class="btn btn-success btn-flat" href="<?php echo base_url("admin/admin/add/")?>">
                            <i class="fa fa-plus"></i> Thêm Mới</a>
                    </div>
                </div>
                <!-- / phan dau bang -->

                <!-- start phan hien thi du lieu -->
                <div class="row">
                    <div class="col-sm-12">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr role="row">
                                <th id="no_sort">
                                    <input type="checkbox" name="check_all[]" id="check_all">
                                </th>
                                <th>Id</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Registration_Date</th>
                                <th id="no_sort">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $temp = "Chưa Cập Nhật";?>
                            <?php foreach($list as $it) : ?>
                                <tr role="row" id="rows_<?php echo $it->id?>" class="tr_check">
                                    <td class="check_box"><input type="checkbox" name="ids[]" value="<?php echo $it->id?>"></td>
                                    <td><?php echo $it->id ?></td>
                                    <td><?php echo $it->username ?></td>
                                    <td><?php echo $it->email ?></td>
                                    <td><?php echo $it->phone ?></td>
                                    <td><?php echo $it->created ?></td>
                                    <td>
                                        <a href="<?php echo base_url("admin/admin/delete/".$it->id)?>" title="Xóa" class="req"><span class="fa fa-remove"></span></a><span class="separate">|</span>
                                        <a href="<?php echo base_url("admin/admin/edit/".$it->id)?>" title="Sửa"><span class="fa fa-edit"></span></a><span class="separate">|</span>
                                        <a href="#row_detail_<?=$it->id?>" title="Chi Tiết" data-toggle='collapse'><span class="fa fa-info"></span></a>
                                    </td>
                                </tr>
                                <!-- phan chi tiet san pham -->
                                <tr class="collapse" id="row_detail_<?=$it->id?>">
                                    <td colspan="7">
                                        <h5><label class="p_label">Full Name : </label> <b><?= $it->full_name ? $it->full_name : $temp?></b><h5>
                                        <h5><label class="p_label">Address : </label> <b><?=$it->address ? $it->address : $temp?></b><h5>
                                        <h5><label class="p_label">Ảnh Đại Diện : </label><?= $it->avatar ? show_img("admin/avatar/".$it->avatar) : show_img("admin/avatar/no_avatar.png")?></label></h5>
                                        <h5><label class="p_label">Giới Thiệu: </label>
                                            <textarea cols="60" rows="3" class="form-control"><?=$it->introduction?></textarea>
                                        </h5>
                                    </td>
                                </tr>
                                <!-- / phan chi tiet san pham -->

                            <?php endforeach?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th rowspan="1" colspan="2">Id</th>
                                <th rowspan="1" colspan="1">Username</th>
                                <th rowspan="1" colspan="1">Email</th>
                                <th rowspan="1" colspan="1">Phone</th>
                                <th rowspan="1" colspan="1">Registration Date</th>
                                <th rowspan="1" colspan="1">Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <button class="btn btn-danger btn-flat" id="delete_selected">Xóa Mục Đã Chọn</button>
                    </div>
                    <div class="col-sm-5">
                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                            Hiển Thị <b><?php echo $per_page?></b> Của <b><?php echo $total ?></b> Bản Ghi
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                            <ul class="pagination">
                                <?php echo $this->pagination->create_links()?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    </div>
</div>
</div>