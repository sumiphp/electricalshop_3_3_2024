<!doctype html>
<html class="no-js" lang="en">
<head>
    <title><?=$subject.' | '.sitename()?></title>
</head>

<body style="background:#b80106;padding:10%;">
		<div style="border-radius:10px;width:80%;margin:auto;background:white;padding:20px;">
			<div class="image" style="margin: auto;">
                <a href="<?=site_url()?>"><img src="<?=$sitedetails['logo']?>" alt="<?=$sitedetails['sitename']?>" style="width:30%;display:block;margin:0 auto;margin-top:15px;"></a>
			</div>
			<div class="content">
				<h2 style="text-align: center;margin-bottom: 0px"><?=$subject?></h2>
				<table style="margin: 0 auto;" >
                    <tr>
						<td style="padding-top: 1em;">Subject </td>
						<td style="padding-top: 1em;">:</td>
						<td style="padding-top: 1em;"><?=$subject?></td>
					</tr>
					<tr>
						<td style="padding-top: 1em;">Priority </td>
						<td style="padding-top: 1em;">:</td>
						<td style="padding-top: 1em;"><?=(($ticket_priority == 1)? 'Low' : (($ticket_priority == 2)? 'Normal' : (($ticket_priority == 3)? 'High' : (($ticket_priority == 4)? 'Urgent' : 'Not Specified' ) ) ) )?></td>
					</tr>
					<tr>
						<td style="padding-top: 1em;">Message </td>
						<td style="padding-top: 1em;">:</td>
						<td style="padding-top: 1em;"><?=trim($ticketMessage)?></td>
					</tr>
                    <tr>
						<td style="padding-top: 1em;">Submitted By </td>
						<td style="padding-top: 1em;">:</td>
						<td style="padding-top: 1em;"><?=trim($loggedInUser['first_name'].' '.$loggedInUser['last_name'])?></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>