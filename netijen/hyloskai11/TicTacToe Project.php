<?php
/*####################################################################
# A simple tic tac toe game
# by Farhan Al Fayyadh & Permadi.com , (hylosakai11@gmail.com)
# created October 2019
####################################################################3

# Global Settings
*/
// Used for iframing the app
$FRAMED=isset($_GET['framed']) ? $_GET['framed']:"0"; 

$IMAGE_PATH="/fpcgi/tictac/";
$EXIT_FILENAME="/fpcgi/index.html";
//#$SOURCE_FILENAME="${PROG_PATH}tictac.pl";
$SCRIPT_FILENAME="index.php";
$NEWGAME_FILENAME=$SCRIPT_FILENAME."?framed=".$FRAMED."&do=new";
//#arbitary large number for indicating winning score
$WIN_SCORE=900;
// used to form links
$PARAM="";
$GRID_VALUES=array();

$NEWGAME_FILENAME=$SCRIPT_FILENAME."?do=new&framed=".$FRAMED;

// make sure the app is run from a valid domain
$server = $_SERVER['SERVER_NAME'];
$validServer = "permadi.com";
if ($server == $validServer)
{
	global $X_WINS, $O_WINS, $ACTION;

	list($usec, $sec) = explode(' ', microtime());
	srand((float) $sec + ((float) $usec * 100000));

	$ACTION=isset($_GET['do']) ? $_GET['do']:"new"; 

	print_header();

	if ($ACTION == "new")
	{
		#indicate that noone is winning yet
		$X_WINS=$O_WINS=0;
		create_new_game();
		create_href_params();
		draw_game();
		print "<BR><BR>Try to win against the computer player in this web version of the popular tic-tac-toe game.";
		print "<br>You may move first and you know that usually that means you should be able to win in a tic-tac-toe game if you move first.";
	}

	if ($ACTION == "play")
	{
		decode_game();
		check_win();
		#make sure computer doesn't move if player already winds
		if ($O_WINS==0)
		{
			move();
		}
		create_href_params();
		check_win();
		check_stalemate();
		draw_game();
		print "<BR><BR>Try to win against the computer player in this web version of the popular tic-tac-toe game.";
	}	

	print_footer();
}


##########################################################################
##########################################################################
function create_new_game()
{
	global $GRID_VALUES;

	#assign an empty tile for each grid
	for ($i=0; $i<9; $i++)
	{
		$GRID_VALUES[$i]='E';
	}
}

##########################################################################
##########################################################################
function decode_game()
{
	global $GRID_VALUES;
    $posParam=isset($_GET['pos']) ? $_GET['pos']:"";
	
	#decode the value on each square
	$pos = split(":", $posParam);
	for ($i=0; $i<9; $i++)
	{
		$GRID_VALUES[$i]=$pos[$i];
	}

	#determine which square is clicked and change its value
	$clickedRow=isset($_GET['row']) ? $_GET['row'] : 0;
	$clickedCol=isset($_GET['col']) ? $_GET['col'] : 0;
	$GRID_VALUES[$clickedRow*3+$clickedCol]='O';
}

##########################################################################
# the $PARAM variable will be appended to clickable tiles so that the game knows the values of each grid.
##########################################################################
function create_href_params()
{
	global $PARAM, $GRID_VALUES, $FRAMED;
	
	$PARAM='framed='.$FRAMED.'&pos=';

	for ($i=0; $i<9; $i++)
	{
		if ($GRID_VALUES[$i] == 'X')
		{
			$PARAM.='X:';
		}
		else if ($GRID_VALUES[$i] == 'O')
		{
			$PARAM.='O:';
		}
		else
		{
			$PARAM.='E:';
		}
	}
}

##########################################################################
##########################################################################
function move()
{
	global $WIN_SCORE, $GRID_VALUES;

	$mustBlockRow=-1;
	$mustBlockCol=-1;
	$bestRow=-1;
	$bestCol=-1;
	$winningRow=-1;
	$winningCol=-1;
	$bestScore=-1;

	for ($row=0; $row<3; $row++)
	{
		for ($col=0; $col<3; $col++)
		{
			// check empty grids and see how we fare we we put a piece on it
			if ($GRID_VALUES[$row*3+$col] == 'E')
			{
				//see whether enemy will win or not if we don't pick this pos
				if (how_good($row, $col,'O','X')>=$WIN_SCORE)
				{
					$mustBlockCol=$col;
					$mustBlockRow=$row;
					$bestRow=$row;
					$bestCol=$col;					
				}
				//how good is this position?
				$newScore=how_good($row, $col, 'X','O');
				//echo "newScore=".$newScore;
				//if better than previous one, select
				// (also select randomly if we got a same score, so that
				// the computer doesn't always pick the same move)
				if (($bestScore<$newScore) || (($bestScore==$newScore) && rand(0,100)>50))
				{
					$bestScore=$newScore;
					$bestRow=$row;
					$bestCol=$col;
				}
				
			}
		}
	}

	//if we have a winning position, pick it
	if ($bestScore>=$WIN_SCORE)
	{
		$GRID_VALUES[$bestRow*3+$bestCol]='X';
	}
	//if we have a position that must be blocked or else the enemy will win, block it
	else if ($mustBlockCol!=-1)
	{
		$GRID_VALUES[$mustBlockRow*3+$mustBlockCol]='X';
	}
	//else, pick the best move
	else if ($GRID_VALUES[$bestRow*3+$bestCol] == 'E')
	{
		$GRID_VALUES[$bestRow*3+$bestCol]='X';
	}
}

##########################################################################
# Find out how good a move is
##########################################################################
function how_good($row, $col, $good, $bad)
{
	global $WIN_SCORE, $GRID_VALUES;
	$score=0;

	//check horizontal
	$occupied=0;
	$totalOccupied=0;
	for ($c=0; $c<3; $c++)
	{
		//straight line from this position is blocked
		if ($GRID_VALUES[$row*3+$c] == $bad)
		{
			$occupied=0;
			$score++;
			break;
		}
		else
		{
			#straight line from this position is not blocked
			if ($c==2)
			{
				$score++;
			}
			if ($GRID_VALUES[$row*3+$c] == $good)
			{
				$occupied++;
			}
		}
	}

	if ($occupied==2)
	{
		$totalOccupied+=$WIN_SCORE;
	}
	$totalOccupied+=$occupied;


	#check vertical
	$occupied=0;
	for ($r=0; $r<3; $r++)
	{
		if ($GRID_VALUES[$r*3+$col] == $bad)
		{
			$occupied=0;
			$score++;
			break;
		}
		else
		{
			if ($r==2)
			{
				$score++;
			}
			if ($GRID_VALUES[$r*3+$col] == $good)
			{
				$occupied++;
			}
		}
	}

	if ($occupied==2)
	{
		$totalOccupied+=$WIN_SCORE;
	}
	$totalOccupied+=$occupied;


	#check diagonal left-right
	if ($row==$col)
	{
		$occupied=0;
		for ($i=0; $i<3; $i++)
		{
			if ($GRID_VALUES[$i*3+$i] == $bad)
			{
				$occupied=0;
				$score++;
				break;
			}
			else
			{
				if ($i==2)
				{
					$score++;
				}

				if ($GRID_VALUES[$i*3+$i] == $good)
				{
					$occupied++;
				}
			}
		}
		if ($occupied==2)
		{
			$totalOccupied+=$WIN_SCORE;
		}
	}

	$totalOccupied+=$occupied;

	#check diagonal right-left
	if ($row==2-$col)
	{
		$occupied=0;
		for ($i=0; $i<3; $i++)
		{
			if ($GRID_VALUES[$i*3+(2-$i)] == $bad)
			{
				$occupied=0;
				$score++;	
				break;
			}
			else
			{
				if ($i==2)
				{
					$score++;
				}

				if ($GRID_VALUES[$i*3+(2-$i)] == $good)
				{
					$occupied++;
				}
			}
		}
		if ($occupied==2)
		{
			$totalOccupied+=$WIN_SCORE;
		}
	}

	$totalOccupied+=$occupied;
	$score+=$totalOccupied;
	#print "<H1>$good, r: $row, c: $col, s:$score </H1>";
	return $score;
}

##########################################################################
##########################################################################
function check_win()
{
	global $X_WINS, $O_WINS, $GRID_VALUES;
	$X_WINS=0;
	$O_WINS=0;

	#check horizontals
	for ($row=0; $row<3; $row++)
	{
		$xOccupied=0;
		$oOccupied=0;
		for ($col=0; $col<3; $col++)
		{
			if ($GRID_VALUES[$row*3+$col] == 'X')
			{
				$xOccupied++;
			}
			else if ($GRID_VALUES[$row*3+$col] == 'O')
			{
				$oOccupied++;
			}
		}
		if (check_win2($xOccupied, $oOccupied))
		{
			return;
		}
	}

	#check verticals
	for ($col=0; $col<3; $col++)
	{
		$xOccupied=0;
		$oOccupied=0;
		for ($row=0; $row<3; $row++)
		{
			if ($GRID_VALUES[$row*3+$col] == 'X')
			{
				$xOccupied++;
			}
			else if ($GRID_VALUES[$row*3+$col] == 'O')
			{
				$oOccupied++;
			}
		}
		if (check_win2($xOccupied, $oOccupied))
		{
			return;
		}
	}

	#check diagonals left-right
	$xOccupied=0;
	$oOccupied=0;

	for ($col=0; $col<3; $col++)
	{
		if ($GRID_VALUES[$col*3+$col] == 'X')
		{
			$xOccupied++;
		}
		else if ($GRID_VALUES[$col*3+$col] == 'O')
		{
			$oOccupied++;
		}
	}
	if (check_win2($xOccupied, $oOccupied))
	{
		return;
	}

	#check diagonals right-left
	$xOccupied=0;
	$oOccupied=0;

	for ($col=0; $col<3; $col++)
	{
		if ($GRID_VALUES[$col*3+(2-$col)] == 'X')
		{
			$xOccupied++;
		}
		else if ($GRID_VALUES[$col*3+(2-$col)] == 'O')
		{
			$oOccupied++;
		}
	}
	check_win2($xOccupied, $oOccupied);
}

##########################################################################
##########################################################################
function check_win2($xOccupied, $oOccupied)
{
	global $X_WINS, $O_WINS;
	
	#since this function may be called multiple times, make sure it doesn't spit out
	# the same messages
	if ($X_WINS ==1 || $O_WINS==1)
	{
		0;
	}
	else if ($xOccupied>=3)
	{
		print "<H3 style='color:red;'>COMPUTER WINS</BLINK></H3>\n";
		$X_WINS=1;
	}
	else if ($oOccupied>=3)
	{
		print "<H3 style='color:green;'>YOU WIN</BLINK></H3>\n";
		$O_WINS=1;
	}
}

##########################################################################
##########################################################################
function check_stalemate()
{
	global $X_WINS, $O_WINS, $GRID_VALUES;
		
	if ($X_WINS==0 && $O_WINS==0)
	{

		#check for stalemate
		$stalemate=1;
		for ($o=0; $o<9; $o++)
		{
			if ($GRID_VALUES[$o] == 'E')
			{
				$stalemate=0;
			}
		}
		if ($stalemate==1)
		{
			print "<H3><BLINK>STALEMATE</BLINK></H3>";
		}
	}
}

##########################################################################
##########################################################################
function draw_game()
{
	global $GRID_VALUES, $IMAGE_PATH, $SCRIPT_FILENAME, $X_WINS, $O_WINS, $PARAM;

	print "<P><P>";
	
	print "<CENTER><TABLE BGCOLOR=\"#FFFFFF\" BORDER=\"0\" CELLPADDING=\"0\" CELLSPACING=\"0\"><TR>";
	for ($row=0; $row<3; $row++)
	{
		for ($col=0; $col<3; $col++)
		{
			#'action' indicates the next action to do
			#'moved' indicates the index of thece that is being moved
			#'moves' indicates the total #of moves that has been performed
			print "<TD NOWRAP>";
			if ($GRID_VALUES[$row*3+$col] == 'E' && $X_WINS==0 && $O_WINS==0)
			{
				print "<A HREF=$SCRIPT_FILENAME?do=play&$PARAM&row=$row&col=$col>";
			}
			print "<IMG WIDTH=\"75\" HEIGHT=\"75\" BORDER=\"1\" SRC=\"$IMAGE_PATH";
			if ($GRID_VALUES[$row*3+$col] == 'O')
			{
				#image name is "o.gif"
				print "o";
			}
			else if ($GRID_VALUES[$row*3+$col] == 'X')
			{
				#image name is "x.gif"
				print "x";
			}
			else
			{
				#image name is "e.gif"
				print "e";
			}
			print ".gif\"></A>";
		}
		print "<TR>";
	}
	print "</TABLE>\n";
	print "<BR><BR>PLAYER IS  <IMG ALIGN=ABSMIDDLE WIDTH=\"20\" HEIGHT=\"20\" SRC=\"".$IMAGE_PATH."o.gif\">\n<BR>Click a tile to move.\n";
}


##########################################################################
##########################################################################
function print_header()
{
	global $FRAMED;
	# Print the required HTTPD Content header
    print "<HTML><HEAD><TITLE>Web and Mobile Tic Tac Toe Game</TITLE>\n
		<meta name=\"Keywords\" content=\"Web games, mobile games, WAP games, online fun, tic tac toe, tic-tac-toe\">\n
		<meta name=\"Description\" content=\"Tic Tac Toe for Web and Mobile\"></HEAD>		\n";
	if ($FRAMED=="0")
	{
		echo '<LINK REL=stylesheet TYPE=\"text/css\" HREF=\"/style/main.css\">\n';
		print "<BODY BGCOLOR=\"#FFFFFF\" TEXT=\"#000000\" ALINK=\"#000088\" VLINK=\"#000088\" LINK=\"#000088\"><CENTER>\n";
	}
	else
	{
		print "<BODY><CENTER>\n";		
	}


	if ($FRAMED=="0")
	{		
		print "<p>\n
		<TABLE CELLSPACING=\"0\" CELLPADDING=\"35\" 
		bordercolor=\"#000000\" ALIGN=\"CENTER\" BORDER=\"1\" BGCOLOR=\"#0099CC\" style='width:100%;'>
		<TR><TD ALIGN=\"CENTER\">
		<IMG SRC=\"/fpcgi/images/header.gif\">
		</TD></TR><TR><TD ALIGN=\"CENTER\" BGCOLOR=\"#FFFFFF\">\n
                <H2>CGI Tic Tac Toe</H2>\n";
	}
}

##########################################################################
##########################################################################
function print_footer()
{
	global $NEWGAME_FILENAME, $EXIT_FILENAME, $SCRIPT_FILENAME, $FRAMED;
	
	print "<HR><BR><A  CLASS=\"darklink\" HREF=\"$NEWGAME_FILENAME\">RESTART</A>\n";
	print "<HR><BR><A  CLASS=\"darklink\" HREF=\"/\">GET THE SOURCE (PHP)</A>\n";
#	print "<BR><A CLASS=\"darklink\" HREF=\"$SCRIPT_FILENAME?do=source\">SOURCE (Perl5/Win32)</A>\n";
	print "<P>This online tic tac toe game is Maintained by Farhan Al Fayyadh";
	if ($FRAMED=="0")
	{	
		print "\n</TABLE>";
	}
	print"</CENTER></BODY></HTML>\n";
}





