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
	// ��Դ��ĳ���ϳ��򡣡�
    //
    // // @example    $spTotalVoteNum|sp_pager:20:$spVotelistPn:10:' href="?rn=20&pn=#{pn}"'
	//˵��������Ƿ�ҳͨ�ú�����������ֻ�������ɷ�ҳ��Ϣ���������ݿ�����κβ�����
	//$resultCount: ��¼������
	//$pageSize��ÿҳ��ʾ�ļ�¼��
	//$currentPage����ǰҳ��
	//$linkCount��չ�ֵ�����ҳ��
	//$url:����URLģ�壬��ʽ�磺' myPage?pn=#{pn}&rn=20" ' ����' #" onclick="showPage(#{pn})" '
    $resultCount = (empty($params['total'])) ? 0 : $params['total'];
    $pageSize = (empty($params['rn'])) ? 20 : $params['rn'];
    $currentPage = (empty($params['pn'])) ? 0 : $params['pn'];
    $linkCount = (empty($params['count'])) ? 10 : $params['count'];
    $url = (empty($params['tpl'])) ? ' href="?pn=#{pn}"' : $params['tpl'];


	//������ҳ��
    $pageCount=0;
    $PN_MARK='#{pn}';
	if($resultCount%$pageSize==0)
	{
		$pageCount=(int)$resultCount/$pageSize;
	} else {
		$pageCount=(int)($resultCount/$pageSize)+1;
	}

	$currentPage=$currentPage + 1;
	//���㵱ǰҳ
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
	// $currentPage, ��ǰҳ��.
	// $link_count, ��������.
	// $pageCount, ��ǰ�����ݵ���ҳ��.
	// $start, ��ʾʱ����ʼҳ��.
	// $end, ��ʾʱ����ֹҳ��.
	$start = max(1, $currentPage - intval($linkCount/2));
	$end = min($start + $linkCount - 1, $pageCount);
	$start = max(1, $end - $linkCount + 1);

	//��ʼƴ��[��һҳ],[��һҳ]������
	$pageBar = '';

	if($currentPage > 1){
		$pageBar = $pageBar. '<a '.str_replace($PN_MARK,'0', $url).'>[��ҳ]</a> ';
		$pageBar = $pageBar. '<a '.str_replace($PN_MARK, ($currentPage-1 -1), $url).'>[��һҳ]</a> ';
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
		$pageBar = $pageBar.'<a '.str_replace($PN_MARK, $currentPage, $url).'>[��һҳ]</a> ';
		$pageBar = $pageBar.'<a '.str_replace($PN_MARK, ($pageCount -1), $url).'>[βҳ]</a> ';
	}
	return $pageBar;
}

?>
