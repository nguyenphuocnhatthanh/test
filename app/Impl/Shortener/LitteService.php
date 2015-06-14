<?php namespace App\Impl\Shortener;
/**
 * Created by PhpStorm.
 * User: Chelsea
 * Date: 3/14/2015
 * Time: 9:40 AM
 */
use App\Impl\Shortener\Exceptions\NonExistenHashException;
use App\Impl\Reponsitory\Link\LinkInterface;
use App\Impl\Ultities\UrlHasher;
class LitteService{

    /**
     * @var LinkInterface;
     */
    protected $link;

    /**
     * @var UrlHasher
     */
    protected $urlHasher;

    public function __construct(LinkInterface $link, UrlHasher $urlHasher){
        $this->link = $link;
        $this->urlHasher = $urlHasher;
    }

    /**
     * Check url hashed?
     * @param $url
     * @return mixed
     */
    public function make($url){
        $link = $this->link->byUrl($url);

        return $link ? $link->hash : $this->makeHash($url);
    }

    /**
     * Get Url hashed
     * @param $hash
     * @return mixed
     * @throws NonExistenHashException
     */
    public function getUrlByHash($hash){
        $link = $this->link->byHash($hash);
        if( ! $link) throw new NonExistenHashException;
        return $link->url;
    }

    /**
     * create data
     * @param $url
     * @return string
     */
    public function makeHash($url){
        $hash = $this->urlHasher->make($url);

        $data = compact('url', 'hash');
        \Event::fire('link.creating', [$data]);
        $this->link->create($data);
        return $hash;
    }
}