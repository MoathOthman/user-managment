<?php

namespace webvimark\modules\UserManagement\controllers;

use Yii;
use webvimark\modules\UserManagement\models\rbacDB\AuthItemDetailed;
use webvimark\modules\UserManagement\models\rbacDB\Permission;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use sammaye\audittrail\AuditTrail;
use sammaye\audittrail\LoggableBehavior;

/**
 * AuthItemDetailedController implements the CRUD actions for AuthItemDetailed model.
 */
class AuthItemDetailedController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'sammaye\audittrail\LoggableBehavior',
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all AuthItemDetailed models.
     * @return mixed
     */
    public function actionIndex()
    {
        //return 'test';
        $auth_item_tb =Yii::$app->getModule('user-management')->auth_item_table;
        $auth_item_det_tb = Yii::$app->getModule('user-management')->auth_item_detailed_table;
        /*
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("
        INSERT INTO $auth_item_det_tb (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`, `group_code`)
       (SELECT t1.*
            FROM $auth_item_tb t1
            LEFT JOIN $auth_item_det_tb t2 ON t2.name = t1.name
            WHERE t2.name IS NULL)
        ");
       $command->execute();
        */
       $detailsKey = AuthItemDetailed::find()->select(['name'])->asArray()->all();
       foreach ($detailsKey as $dk)
       {
           $detailsname[] = $dk['name'];
       }
       //echo json_encode( $detailsname);exit;
       if(!empty($detailsname))
       {
       $items = Permission::find()
                        ->select('*')
                        ->where([])
			->andWhere(['not in', $auth_item_tb. '.name', $detailsname])
			//->joinWith('group')
                        ->asArray()
			->all();
       }  else {
           $items = Permission::find()
                        ->select('*')
                        ->where([])
			//->andWhere(['not in', $auth_item_tb. '.name', $detailsname])
			//->joinWith('group')
                        ->asArray()
			->all();
       }
               // print_r($items);exit;
       $tableName = $auth_item_det_tb;
       if(count($items)>0){
            $columnNameArray=['name','type','description', 'rule_name', 'data', 'created_at', 'updated_at', 'group_code'];
            // below line insert all your record and return number of rows inserted
            $insertCount = Yii::$app->db->createCommand()
                   ->batchInsert(
                         $tableName, $columnNameArray, $items
                     )
                   ->execute();
        }

               
        $dataProvider = new ActiveDataProvider([
            'query' => AuthItemDetailed::find()->where(['type'=>3]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AuthItemDetailed model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AuthItemDetailed model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthItemDetailed();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AuthItemDetailed model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AuthItemDetailed model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AuthItemDetailed model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuthItemDetailed the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthItemDetailed::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
