<?php
/**
 * Created by PhpStorm.
 * user: armen5518
 * Date: 16.08.2016
 * Time: 22:36
 */

?>
<div class="container">
    <div class="row">
        <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
            <A href="<?=Yii::$app->params['domain']?>/user/update?id=<?=$user->id?>">Edit Profile</A>

           <br>
            <p class=" text-info">May 05,2014,03:00 pm </p>
        </div>
        <div
            class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">


            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= $user->username ?></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center"><img alt="User Pic"
                                                                            src="/doc/backend/web/assets/42a5667f/img/user2-160x160.jpg"
                                                                            class="img-circle img-responsive"></div>

                        <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                          <dl>
                            <dt>DEPARTMENT:</dt>
                            <dd>Administrator</dd>
                            <dt>HIRE DATE</dt>
                            <dd>11/12/2013</dd>
                            <dt>DATE OF BIRTH</dt>
                               <dd>11/12/2013</dd>
                            <dt>GENDER</dt>
                            <dd>Male</dd>
                          </dl>
                        </div>-->
                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td>User Name:</td>
                                    <td><?= $user->username ?> </td>
                                </tr>
                                <tr>
                                    <td>Department:</td>
                                    <td>Programming</td>
                                </tr>
                                <tr>
                                    <td>Hire date:</td>
                                    <td>06/23/2013</td>
                                </tr>
                                <tr>
                                    <td>Date of Birth</td>
                                    <td>01/24/1988</td>
                                </tr>

                                <tr>
                                <tr>
                                    <td>Gender</td>
                                    <td>Male</td>
                                </tr>
                                <tr>
                                    <td>Home Address</td>
                                    <td>Metro Manila,Philippines</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><a href="mailto:info@support.com"><?= $user->email ?></a></td>
                                </tr>
                                <td>Phone Number</td>
                                <td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)
                                </td>

                                </tr>

                                </tbody>
                            </table>

<!--                            <a href="#" class="btn btn-primary">My Sales Performance</a>-->
<!--                            <a href="#" class="btn btn-primary">Team Sales Performance</a>-->
                            <div class="panel-footer">
                                <span class="pull-right">
                                    <a href="<?=Yii::$app->params['domain']?>/user/update?id=<?=$user->id?>" data-original-title="Edit this user" data-toggle="tooltip" type="button"
                                       class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
