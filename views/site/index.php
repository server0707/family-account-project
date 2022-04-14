<?php
/**
 * @property FamilyAccount[] $familyAccounts
 * @property User[] $familyMembers
 */

use app\models\FamilyAccount;
use app\models\User;
use yii\helpers\Html;

$this->title = 'Asosiy sahifa';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
    <!--    <a href="-->
    <? //=\yii\helpers\Url::to(['site/fake-data'])?><!--" class="btn btn-danger">Generate fake data</a>-->
    <h3 class="text-center">Oxirgi haftadagi kirim/chiqimlar</h3>
    <div class="row">
        <div class="col-8">
            <p>
                <?= Html::a('+', ['family-account/create'], ['class' => 'btn btn-success']) ?>
            </p>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Shakli</th>
                    <th scope="col">Qiymati</th>
                    <th scope="col">Sana</th>
                    <th scope="col">Kategoriya</th>
                </tr>
                </thead>
                <tbody>
                <?php $cnt = 1;
                foreach ($familyAccounts as $familyAccount) : ?>
                    <tr onclick="location.href = '<?=\yii\helpers\Url::to(['family-account/view', 'id' => $familyAccount->id])?>'">
                        <th scope="row"><?= $cnt++ ?></th>
                        <td><?= ['Kirim', 'Chiqim'][$familyAccount->type] ?></td>
                        <td><?= $familyAccount->getQuantum() ?></td>
                        <td><?= $familyAccount->date ?></td>
                        <td><?= $familyAccount->category->name ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-4">
            <h3 class="text-center">Oila a'zolari</h3>
            <table class="table table-hover table-info">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ismi</th>
                </tr>
                </thead>
                <tbody>
                <?php $cnt = 1;
                foreach ($familyMembers as $familyMember) : ?>
                    <tr>
                        <th scope="row"><?= $cnt++ ?></th>
                        <td><?= $familyMember->fullName ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>