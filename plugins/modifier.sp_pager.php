<?php

function smarty_modifier_sp_pager($resultCount, $pageSize, $currentPage, $linkCount, $url)
{
	// ��Դ��ĳ���ϳ��򡣡�

	//˵��������Ƿ�ҳͨ�ú�����������ֻ�������ɷ�ҳ��Ϣ���������ݿ�����κβ�����
	//$resultCount: ��¼������
	//$pageSize��ÿҳ��ʾ�ļ�¼��
	//$currentPage����ǰҳ��
	//$url:����URL�������ǡ�myPage?page=�����߿��Ը�������myPage?name=searchName&page=��
	
	//������ҳ��
	$pageCount=0;
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
		$pageBar = $pageBar. '<a class="ch" href="'.$url.'0">��ҳ</a> ';
		$pageBar = $pageBar. '<a class="ch" href="'.$url.($currentPage-1 -1).'">��һҳ</a> ';
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
		$pageBar = $pageBar.'<a class="ch" href="'.$url.$currentPage.'">��һҳ</a> ';
		$pageBar = $pageBar.'<a class="ch" href="'.$url.($pageCount -1).'">βҳ</a> ';
	}
	return $pageBar;
}

?>
