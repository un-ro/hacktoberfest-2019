<?php 
include('../config/conn.php');

$query = "SELECT * FROM login where username = '".$_SESSION["username"]."'";
# Get the query result
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result)
?>

<article class="cssui-usercard">
		<div class="cssui-usercard__body">
			<header class="cssui-usercard__header">
				<div class="cssui-usercard__header-info">
                    <h3 class="cssui-usercard__name"><?php echo $row["nama"]; ?></h3>
					<span class="cssui-usercard__post">Admin</span>
				</div>
			</header>
			<div class="cssui-usercard__content">
				<div class="cssui-slider">

					<!-- the control elements of slider -->

					<div class="cssui-slider__slides">

						<div class="cssui-slider__slide">
							<h4 class="cssui-usercard__title">My Contacts</h4>
							<div class="cssui-usercard__stats">
								<div class="cssui-stats cssui-usercard__stats-item">
									<i class="cssui-icon icon-email"></i>
									<div class="cssui-stats__info cssui-usercard__stats-info">
										<span class="cssui-stats__name cssui-usercard__stats-name">E-mail</span>
										<a href="#0" class="cssui-stats__value"><?php echo $row["email"]; ?></a>
									</div>
								</div>
								<div class="cssui-stats cssui-usercard__stats-item">
									<i class="cssui-icon icon-phone"></i>
									<div class="cssui-stats__info cssui-usercard__stats-info">
										<span class="cssui-stats__name cssui-usercard__stats-name">Phone</span>
										<a href="tel:79000000000" class="cssui-stats__value"><?php echo $row["no_telp"]; ?></a>
									</div>
								</div>
								<div class="cssui-stats cssui-usercard__stats-item">
									<i class="cssui-icon icon-whatsapp"></i>
									<div class="cssui-stats__info cssui-usercard__stats-info">
										<span class="cssui-stats__name cssui-usercard__stats-name">WhatsApp</span>
										<span class="cssui-stats__value"><?php echo $row["no_telp"]; ?></span>
									</div>
								</div>
								<div class="cssui-stats cssui-usercard__stats-item">
									<i class="cssui-icon icon-skype"></i>
									<div class="cssui-stats__info cssui-usercard__stats-info">
										<span class="cssui-stats__name cssui-usercard__stats-name">Address</span>
										<span class="cssui-stats__value"><?php echo $row["alamat"]; ?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</article>