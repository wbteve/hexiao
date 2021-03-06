<?php
/**
 * Created by PhpStorm.
 * User: Blacky
 * Date: 2017/10/13
 * Time: 19:16
 */

namespace app\api\model;

class TyVenueBranch extends BaseModel
{
    protected $autoWriteTimestamp = true;
    protected $hidden = ['create_time', 'update_time'];

    //关联收藏表
    public function collection()
    {
        return $this->belongsTo('TyCollection','id','venue_branch_id');
    }

    /**
     * 获取盒子信息
     * @param $sid 盒子ID
     * @param bool $paginate
     * @return \think\Paginator
     */
    public static function VenueList()
    {
    	$venue = self::with('collection')->select()->toArray();
    	return $venue;
    }

    /**
     * 获取场馆信息
     * @param $id 场馆ID
     * @param bool $paginate
     * @return \think\Paginator
     */
    public static function VenueDetails($id)
    {
        $where = array('id'=>$id,'status'=>1);
        $venueData = self::where('id',$id)->find()->toArray();
        return $venueData;
    }
    
}