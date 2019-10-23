<?php declare(strict_types=1);


namespace App\Model\Entity;

use Swoft\Db\Annotation\Mapping\Column;
use Swoft\Db\Annotation\Mapping\Entity;
use Swoft\Db\Annotation\Mapping\Id;
use Swoft\Db\Eloquent\Model;


/**
 * 用户信息表
 * Class Account
 *
 * @since 2.0
 *
 * @Entity(table="account")
 */
class Account extends Model
{
    /**
     * 
     * @Id()
     * @Column()
     *
     * @var int
     */
    private $uid;

    /**
     * 用户名
     *
     * @Column()
     *
     * @var string
     */
    private $username;

    /**
     * 注册时间
     *
     * @Column()
     *
     * @var string|null
     */
    private $addtime;

    /**
     * 最后登录时间
     *
     * @Column()
     *
     * @var string|null
     */
    private $lasttime;

    /**
     * token
     *
     * @Column()
     *
     * @var string
     */
    private $token;

    /**
     * 云信token
     *
     * @Column(name="yunxin_token", prop="yunxinToken")
     *
     * @var string|null
     */
    private $yunxinToken;

    /**
     * 用户状态 0正常 1封号
     *
     * @Column()
     *
     * @var int|null
     */
    private $status;

    /**
     * 邀请人的uid
     *
     * @Column(name="invite_uid", prop="inviteUid")
     *
     * @var int|null
     */
    private $inviteUid;

    /**
     * 注册的渠道号
     *
     * @Column()
     *
     * @var int|null
     */
    private $channel;

    /**
     * 备注(运营所用)
     *
     * @Column()
     *
     * @var string|null
     */
    private $remarks;

    /**
     * 微信用户统一标识
     *
     * @Column()
     *
     * @var string
     */
    private $unionid;

    /**
     * 绑定微信时间
     *
     * @Column(name="wx_bind_time", prop="wxBindTime")
     *
     * @var string|null
     */
    private $wxBindTime;

    /**
     * 微信邀请人的uid
     *
     * @Column(name="wx_invite_uid", prop="wxInviteUid")
     *
     * @var int
     */
    private $wxInviteUid;

    /**
     * 总代理uid
     *
     * @Column(name="agent_uid", prop="agentUid")
     *
     * @var int|null
     */
    private $agentUid;

    /**
     * 是否随机匹配成功 0没匹配成功1匹配成功
     *
     * @Column(name="is_matched", prop="isMatched")
     *
     * @var int
     */
    private $isMatched;

    /**
     * 代理等级(0非代理1普通代理2总代)
     *
     * @Column(name="agent_level", prop="agentLevel")
     *
     * @var int
     */
    private $agentLevel;

    /**
     * 封号截止时间
     *
     * @Column(name="kick_end_time", prop="kickEndTime")
     *
     * @var string|null
     */
    private $kickEndTime;

    /**
     * 是否修改过资料 0未修改1修改
     *
     * @Column(name="is_modify", prop="isModify")
     *
     * @var int
     */
    private $isModify;

    /**
     * 通过分享邀请，手机号注册的是否随机通话满一分钟，0未满1满
     *
     * @Column(name="is_have_one_m", prop="isHaveOneM")
     *
     * @var int
     */
    private $isHaveOneM;

    /**
     * 绑定时间
     *
     * @Column(name="invite_time", prop="inviteTime")
     *
     * @var string|null
     */
    private $inviteTime;

    /**
     * 是否新手
     *
     * @Column(name="is_new", prop="isNew")
     *
     * @var int
     */
    private $isNew;

    /**
     * 新手礼包到期时间
     *
     * @Column(name="is_new_time", prop="isNewTime")
     *
     * @var string|null
     */
    private $isNewTime;

    /**
     * 领取新手红包时间
     *
     * @Column(name="get_package_time", prop="getPackageTime")
     *
     * @var string|null
     */
    private $getPackageTime;

    /**
     * 云信房间id（聊天室id，直播间id）
     *
     * @Column(name="yun_xin_room_id", prop="yunXinRoomId")
     *
     * @var string|null
     */
    private $yunXinRoomId;

    /**
     * 登陆密码
     *
     * @Column(hidden=true)
     *
     * @var string|null
     */
    private $password;

    /**
     * 是否已补贴 0未1已补 新注册用户默认已补
     *
     * @Column(name="is_subsidy", prop="isSubsidy")
     *
     * @var int
     */
    private $isSubsidy;

    /**
     * 经验
     *
     * @Column()
     *
     * @var int|null
     */
    private $experience;

    /**
     * 等级
     *
     * @Column()
     *
     * @var int|null
     */
    private $level;


    /**
     * @param int $uid
     *
     * @return void
     */
    public function setUid(int $uid): void
    {
        $this->uid = $uid;
    }

    /**
     * @param string $username
     *
     * @return void
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @param string|null $addtime
     *
     * @return void
     */
    public function setAddtime(?string $addtime): void
    {
        $this->addtime = $addtime;
    }

    /**
     * @param string|null $lasttime
     *
     * @return void
     */
    public function setLasttime(?string $lasttime): void
    {
        $this->lasttime = $lasttime;
    }

    /**
     * @param string $token
     *
     * @return void
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    /**
     * @param string|null $yunxinToken
     *
     * @return void
     */
    public function setYunxinToken(?string $yunxinToken): void
    {
        $this->yunxinToken = $yunxinToken;
    }

    /**
     * @param int|null $status
     *
     * @return void
     */
    public function setStatus(?int $status): void
    {
        $this->status = $status;
    }

    /**
     * @param int|null $inviteUid
     *
     * @return void
     */
    public function setInviteUid(?int $inviteUid): void
    {
        $this->inviteUid = $inviteUid;
    }

    /**
     * @param int|null $channel
     *
     * @return void
     */
    public function setChannel(?int $channel): void
    {
        $this->channel = $channel;
    }

    /**
     * @param string|null $remarks
     *
     * @return void
     */
    public function setRemarks(?string $remarks): void
    {
        $this->remarks = $remarks;
    }

    /**
     * @param string $unionid
     *
     * @return void
     */
    public function setUnionid(string $unionid): void
    {
        $this->unionid = $unionid;
    }

    /**
     * @param string|null $wxBindTime
     *
     * @return void
     */
    public function setWxBindTime(?string $wxBindTime): void
    {
        $this->wxBindTime = $wxBindTime;
    }

    /**
     * @param int $wxInviteUid
     *
     * @return void
     */
    public function setWxInviteUid(int $wxInviteUid): void
    {
        $this->wxInviteUid = $wxInviteUid;
    }

    /**
     * @param int|null $agentUid
     *
     * @return void
     */
    public function setAgentUid(?int $agentUid): void
    {
        $this->agentUid = $agentUid;
    }

    /**
     * @param int $isMatched
     *
     * @return void
     */
    public function setIsMatched(int $isMatched): void
    {
        $this->isMatched = $isMatched;
    }

    /**
     * @param int $agentLevel
     *
     * @return void
     */
    public function setAgentLevel(int $agentLevel): void
    {
        $this->agentLevel = $agentLevel;
    }

    /**
     * @param string|null $kickEndTime
     *
     * @return void
     */
    public function setKickEndTime(?string $kickEndTime): void
    {
        $this->kickEndTime = $kickEndTime;
    }

    /**
     * @param int $isModify
     *
     * @return void
     */
    public function setIsModify(int $isModify): void
    {
        $this->isModify = $isModify;
    }

    /**
     * @param int $isHaveOneM
     *
     * @return void
     */
    public function setIsHaveOneM(int $isHaveOneM): void
    {
        $this->isHaveOneM = $isHaveOneM;
    }

    /**
     * @param string|null $inviteTime
     *
     * @return void
     */
    public function setInviteTime(?string $inviteTime): void
    {
        $this->inviteTime = $inviteTime;
    }

    /**
     * @param int $isNew
     *
     * @return void
     */
    public function setIsNew(int $isNew): void
    {
        $this->isNew = $isNew;
    }

    /**
     * @param string|null $isNewTime
     *
     * @return void
     */
    public function setIsNewTime(?string $isNewTime): void
    {
        $this->isNewTime = $isNewTime;
    }

    /**
     * @param string|null $getPackageTime
     *
     * @return void
     */
    public function setGetPackageTime(?string $getPackageTime): void
    {
        $this->getPackageTime = $getPackageTime;
    }

    /**
     * @param string|null $yunXinRoomId
     *
     * @return void
     */
    public function setYunXinRoomId(?string $yunXinRoomId): void
    {
        $this->yunXinRoomId = $yunXinRoomId;
    }

    /**
     * @param string|null $password
     *
     * @return void
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    /**
     * @param int $isSubsidy
     *
     * @return void
     */
    public function setIsSubsidy(int $isSubsidy): void
    {
        $this->isSubsidy = $isSubsidy;
    }

    /**
     * @param int|null $experience
     *
     * @return void
     */
    public function setExperience(?int $experience): void
    {
        $this->experience = $experience;
    }

    /**
     * @param int|null $level
     *
     * @return void
     */
    public function setLevel(?int $level): void
    {
        $this->level = $level;
    }

    /**
     * @return int
     */
    public function getUid(): ?int
    {
        return $this->uid;
    }

    /**
     * @return string
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @return string|null
     */
    public function getAddtime(): ?string
    {
        return $this->addtime;
    }

    /**
     * @return string|null
     */
    public function getLasttime(): ?string
    {
        return $this->lasttime;
    }

    /**
     * @return string
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @return string|null
     */
    public function getYunxinToken(): ?string
    {
        return $this->yunxinToken;
    }

    /**
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @return int|null
     */
    public function getInviteUid(): ?int
    {
        return $this->inviteUid;
    }

    /**
     * @return int|null
     */
    public function getChannel(): ?int
    {
        return $this->channel;
    }

    /**
     * @return string|null
     */
    public function getRemarks(): ?string
    {
        return $this->remarks;
    }

    /**
     * @return string
     */
    public function getUnionid(): ?string
    {
        return $this->unionid;
    }

    /**
     * @return string|null
     */
    public function getWxBindTime(): ?string
    {
        return $this->wxBindTime;
    }

    /**
     * @return int
     */
    public function getWxInviteUid(): ?int
    {
        return $this->wxInviteUid;
    }

    /**
     * @return int|null
     */
    public function getAgentUid(): ?int
    {
        return $this->agentUid;
    }

    /**
     * @return int
     */
    public function getIsMatched(): ?int
    {
        return $this->isMatched;
    }

    /**
     * @return int
     */
    public function getAgentLevel(): ?int
    {
        return $this->agentLevel;
    }

    /**
     * @return string|null
     */
    public function getKickEndTime(): ?string
    {
        return $this->kickEndTime;
    }

    /**
     * @return int
     */
    public function getIsModify(): ?int
    {
        return $this->isModify;
    }

    /**
     * @return int
     */
    public function getIsHaveOneM(): ?int
    {
        return $this->isHaveOneM;
    }

    /**
     * @return string|null
     */
    public function getInviteTime(): ?string
    {
        return $this->inviteTime;
    }

    /**
     * @return int
     */
    public function getIsNew(): ?int
    {
        return $this->isNew;
    }

    /**
     * @return string|null
     */
    public function getIsNewTime(): ?string
    {
        return $this->isNewTime;
    }

    /**
     * @return string|null
     */
    public function getGetPackageTime(): ?string
    {
        return $this->getPackageTime;
    }

    /**
     * @return string|null
     */
    public function getYunXinRoomId(): ?string
    {
        return $this->yunXinRoomId;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @return int
     */
    public function getIsSubsidy(): ?int
    {
        return $this->isSubsidy;
    }

    /**
     * @return int|null
     */
    public function getExperience(): ?int
    {
        return $this->experience;
    }

    /**
     * @return int|null
     */
    public function getLevel(): ?int
    {
        return $this->level;
    }

}
