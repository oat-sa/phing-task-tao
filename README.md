phing-task-tao
==============

set of phing tasks to deploy tao

	<taoinstall taoPath="${src.dir.resolved}" >
		<taoConfig 	
	      		login="${user.login}"
	      		pass="${user.pass}">
	      	<taoDbConfig 
	      		dbDriver="${db.driver}" 
	      		dbHost="${db.host}"
	      		dbUser="${db.user}"
	      		dbPass="${db.pass}"
	      		dbName="${db.name}"
	      	/>
	      	<generisConfig       		
	      		instanceName="${module.name}"
	      		moduleUrl="${module.url}"
	      		moduleNs="${module.namespace}"
	      		moduleMode="${module.mode}"
	      		dataPath="${src.dir.resolved}/data/"
	      		extensions="${extensions_list}"
	      	/>
	      	</taoConfig>
	</taoinstall>
