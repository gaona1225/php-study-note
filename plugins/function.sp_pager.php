<?php
/**
* Examples:<br>
* <pre>
* <& sp_pager rn=20 pn=$spCurrentPageNum total=$spTotalNum count=10 tpl="href='/showPage?pn=#{pn}'" $ &>
* <& sp_pager pn=$spCurrentPageNum total=$spTotalNum tpl="href='/showPage?pn=#{pn}'" $ &>
* </pre>
 */
function smarty_function_sp_pager($params, &$smarty)
{
	// 来源于某网上程序。。
    //
    // // @example    $spTotalVoteNum|sp_pager:20:$spVotelistPn:10:' href="?rn=20&pn=#{pn}"'
	//说明：这个是分页通用函数，本函数只负责生成分页信息，不对数据库进行任何操作。
	//$resultCount: 记录集总数
	//$pageSize：每页显示的记录数
	//$currentPage：当前页数
	//$linkCount：展现的链接页数
	//$url:连接URL模板，格式如：' myPage?pn=#{pn}&rn=20" ' 或者' #" onclick="showPage(#{pn})" '
    $resultCount = (empty($params['total'])) ? 0 : $params['total'];
    $pageSize = (empty($params['rn'])) ? 20 : $params['rn'];
    $currentPage = (empty($params['pn'])) ? 0 : $params['pn'];
    $linkCount = (empty($params['count'])) ? 10 : $params['count'];
    $url = (empty($params['tpl'])) ? ' href="?pn=#{pn}"' : $params['tpl'];


	//计算总页数
    $pageCount=0;
    $PN_MARK='#{pn}';
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
		$pageBar = $pageBar. '<a '.str_replace($PN_MARK,'0', $url).'>[首页]</a> ';
		$pageBar = $pageBar. '<a '.str_replace($PN_MARK, ($currentPage-1 -1), $url).'>[上一页]</a> ';
	}		
	for($i=$start; $i <= $end; $i++)
	{
		if($i == $currentPage)
		{
			$pageBar = $pageBar.'<span>' . $i . '</span> ';
		}
		else
		{
			$pageBar = $pageBar.'<a ' . str_replace($PN_MARK, ($i-1), $url).'>['.$i.']</a> ';
		}
	}
	if($currentPage < $pageCount){
		$pageBar = $pageBar.'<a '.str_replace($PN_MARK, $currentPage, $url).'>[下一页]</a> ';
		$pageBar = $pageBar.'<a '.str_replace($PN_MARK, ($pageCount -1), $url).'>[尾页]</a> ';
	}
	return $pageBar;
}

?>
