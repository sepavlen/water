@extends('backend.layout.app')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">Главная</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Пользователи</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"> Список пользователей
    </h3>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <button id="sample_editable_1_new" class="btn sbold green"> Добавить нового пользователя
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover ">
                        <thead>
                        <tr>
                            <th> Имя пользователя</th>
                            <th> Email</th>
                            <th> Роль</th>
                            <th> Статус</th>
                            <th> Редактирвать</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="odd gradeX">
                            <td> shuxer</td>
                            <td>
                                <a href="mailto:shuxer@gmail.com"> shuxer@gmail.com </a>
                            </td>
                            <td class="center"> Администратор</td>
                            <td>
                                <span class="label label-sm label-success"> Активный </span>
                            </td>
                            <td class="text-center">
                                <span class="fa fa-edit"> </span>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
                            <td> looper</td>
                            <td>
                                <a href="mailto:looper90@gmail.com"> looper90@gmail.com </a>
                            </td>
                            <td class="center"> Администратор</td>
                            <td>
                                <span class="label label-sm label-success"> Активный </span>
                            </td>
                            <td>
                                <span class="fa fa-edit"> </span>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
                            <td> userwow</td>
                            <td>
                                <a href="mailto:userwow@yahoo.com"> userwow@yahoo.com </a>
                            </td>
                            <td class="center"> Менеджер</td>
                            <td>
                                <span class="label label-sm label-success"> Активный </span>
                            </td>
                            <td>
                                <span class="fa fa-edit"> </span>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
                            <td> user1wow</td>
                            <td>
                                <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                            </td>
                            <td class="center"> Менеджер</td>
                            <td>
                                <span class="label label-sm label-danger"> Заблокирован </span>
                            </td>
                            <td>
                                <span class="fa fa-edit"> </span>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
                            <td> restest</td>
                            <td>
                                <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                            </td>
                            <td class="center"> Менеджер</td>
                            <td>
                                <span class="label label-sm label-success"> Активный </span>
                            </td>
                            <td>
                                <span class="fa fa-edit"> </span>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
                            <td> foopl</td>
                            <td>
                                <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                            </td>
                            <td class="center"> Менеджер</td>
                            <td>
                                <span class="label label-sm label-success"> Активный </span>
                            </td>
                            <td>
                                <span class="fa fa-edit"> </span>
                            </td>
                        </tr>
                        <tr class="odd gradeX">
                            <td> weep</td>
                            <td>
                                <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                            </td>
                            <td class="center"> Менеджер</td>
                            <td>
                                <span class="label label-sm label-success"> Активный </span>
                            </td>
                            <td>
                                <span class="fa fa-edit"> </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>


@endsection
