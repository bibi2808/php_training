<html>

<head>
	<?php echo $this->_metaHTTP; ?>
	<?php echo $this->_metaName; ?>
	<?php echo $this->_title; ?>
	<?php echo $this->_cssFiles; ?>
	<?php echo $this->_jsFiles; ?>
</head>

<body>
	<div id="border-top" class="h_blue">
		<span class="title"><a href="index.php">Administration</a></span>
	</div>
	<div id="content-box">
		<!--  LOAD CONTENT -->
		<?php require_once APPLICATION_PATH . $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php'; ?>
	</div>
	<div id="footer">
		<p class="copyright">
			<a href="http://www.joomla.org">Joomla!&#174;</a> is free software released under the <a href="http://www.gnu.org/licenses/gpl-2.0.html">GNU General Public License</a>.
		</p>
	</div>
</body>

</html>