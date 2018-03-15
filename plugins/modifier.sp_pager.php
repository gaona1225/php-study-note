<?php

function smarty_modifier_sp_pager($resultCount, $pageSize, $currentPage, $linkCount, $url)
{
	// 来源于某网上程序。。

	//说明：这个是分页通用函数，本函数只负责生成分页信息，不对数据库进行任何操作。
	//$resultCount: 记录集总数
	//$pageSize：每页显示的记录数
	//$currentPage：当前页数
	//$url:连接URL，可以是“myPage?page=”或者可以跟参数“myPage?name=searchName&page=”
	
	//计算总页数
	$pageCount=0;
	if($resultCount%$pageSize==0)
	{
		$pageCount=(int)$resultCount/$pageSize;
	} else {
		$pageCount=(int)($resultCount/$pageSize)+1;
	}

	$currentPage=$currentPage + 1;
	//计算当前页
	if(!$currentPage||$currentPage<0)
	{
		$currentPage=1;
	}
	if($currentPage>=$pageCount)
	{
		$currentPage=$pageCount;
	}

	if($pageCount <= 1)
	{
		$pageBar = ' &nbsp; ';
		return $pageBar;
	}
	// $currentPage, 当前页码.
	// $link_count, 链接数量.
	// $pageCount, 当前的数据的总页数.
	// $start, 显示时的起始页码.
	// $end, 显示时的终止页码.
	$start = max(1, $currentPage - intval($linkCount/2));
	$end = min($start + $linkCount - 1, $pageCount);
	$start = max(1, $end - $linkCount + 1);

	//开始拼凑[上一页],[下一页]等连接
	$pageBar = '';

	if($currentPage > 1){
		$pageBar = $pageBar. '<a class="ch" href="'.$url.'0">首页</a> ';
		$pageBar = $pageBar. '<a class="ch" href="'.$url.($currentPage-1 -1).'">上一页</a> ';
	}		
	for($i=$start; $i <= $end; $i++)
	{
		if($i == $currentPage)
		{
			$pageBar = $pageBar.'<span>' . $i . '</span> ';
		}
		else
		{
			$pageBar = $pageBar.'<a href="' . $url .($i-1).'">'.$i.'</a> ';
		}
	}
	if($currentPage < $pageCount){
		$pageBar = $pageBar.'<a class="ch" href="'.$url.$currentPage.'">下一页</a> ';
		$pageBar = $pageBar.'<a class="ch" href="'.$url.($pageCount -1).'">尾页</a> ';
	}
	return $pageBar;
}

?>
