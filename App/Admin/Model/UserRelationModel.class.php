<?php/** * Created by PhpStorm. * User: Administrator * Date: 2015/2/7 * Time: 22:41 */namespace Admin\Model;use Think\Model\RelationModel;/* * 用户与角色关联模型 */class UserRelationModel extends RelationModel{    protected $tableName='user';    //定义关联关系    protected $_link=array(      'role'=>array(          'mapping_type'=>self::MANY_TO_MANY,          'foreign_key'=>'user_id',          'relation_key'=>'role_id',          'relation_table'=>'aunet_role_user',          'mapping_fields'=>'id,name,remark'      )    );}