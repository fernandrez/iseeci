<?php
    Yii :: import('zii.widgets.CMenu');
    class MenuWidget extends CMenu {
    // must set this to allow  parameter changes in CMenu widget call
        public $activateItemsOuter = true;
 
        public function run() {
            $this->renderMenu($this->items);
        }
		
		protected function renderMenu($items){
			if(count($items)>0)
			{
				$this->htmlOptions['id']='menu-ul';
				echo CHtml::openTag('ul',$this->htmlOptions)."\n";
				$this->renderMenuRecursive($items);
				echo CHtml::openTag('div',array('id'=>'banderas','class'=>'rfloat'));
				Yii::app()->controller->widget('ext.bandera.BanderaWidget');
				echo CHtml::closeTag('div');
				echo CHtml::tag('div',array('class'=>'clear'));
				echo CHtml::closeTag('ul');
			}
		}
		
		/**
		 * Recursively renders the menu items.
		 * @param array $items the menu items to be rendered recursively
		 */
		protected function renderMenuRecursive($items)
		{
			$count=0;
			$n=count($items);
			echo CHtml::openTag('div',array('id'=>'menu-items','class'=>'lfloat'));
			foreach($items as $item)
			{
				$count++;
				$options=isset($item['itemOptions']) ? $item['itemOptions'] : array();
				$class=array();
				if($item['active'] && $this->activeCssClass!='')
					$class[]=$this->activeCssClass;
				if($count===1 && $this->firstItemCssClass!==null)
					$class[]=$this->firstItemCssClass;
				if($count===$n && $this->lastItemCssClass!==null)
					$class[]=$this->lastItemCssClass;
				if($this->itemCssClass!==null)
					$class[]=$this->itemCssClass;
				if($class!==array())
				{
					if(empty($options['class']))
						$options['class']=implode(' ',$class);
					else
						$options['class'].=' '.implode(' ',$class);
				}
	
				echo CHtml::openTag('li', $options);
	
				$menu=$this->renderMenuItem($item);
				if(isset($this->itemTemplate) || isset($item['template']))
				{
					$template=isset($item['template']) ? $item['template'] : $this->itemTemplate;
					echo strtr($template,array('{menu}'=>$menu));
				}
				else
					echo $menu;
	
				if(isset($item['items']) && count($item['items']))
				{
					echo "\n".CHtml::openTag('ul',isset($item['submenuOptions']) ? $item['submenuOptions'] : $this->submenuHtmlOptions)."\n";
					$this->renderMenuRecursive($item['items']);
					echo CHtml::closeTag('ul')."\n";
				}
	
				echo CHtml::closeTag('li')."\n";
			}
			echo CHtml::closeTag('div');
		}
	}
?>