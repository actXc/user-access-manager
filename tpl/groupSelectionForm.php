<?php
/**
 * groupSelectionForm.php
 * 
 * Shows the selection form.
 * 
 * PHP versions 5
 * 
 * @category  UserAccessManager
 * @package   UserAccessManager
 * @author    Alexander Schneider <alexanderschneider85@googlemail.com>
 * @copyright 2008-2010 Alexander Schneider
 * @license   http://www.gnu.org/licenses/gpl-2.0.html  GNU General Public License, version 2
 * @version   SVN: $Id$
 * @link      http://wordpress.org/extend/plugins/user-access-manager/
 */
?>
<ul class="uam_group_selection">
<?php
foreach ($uamUserGroups as $uamUserGroup) {
    $addition = '';
    $attributes = '';
    
    if (array_key_exists($uamUserGroup->getId(), $userGroupsForObject)) {
        $attributes .= 'checked="checked" ';
    }
    
    if (isset($userGroupsForObject[$uamUserGroup->getId()]->setRecursive[$objectType][$objectId])) {
        $attributes .= 'disabled="" ';
		$addition .= ' [LR]';
	}
    
	?>
	<li>
		<label for="uam_usergroup-<?php echo $uamUserGroup->getId(); ?>" class="selectit" style="display:inline;" >
			<input type="checkbox" id="uam_usergroup-<?php echo $uamUserGroup->getId(); ?>" <?php echo $attributes;?> value="<?php echo $uamUserGroup->getId(); ?>" name="uam_usergroups[]" />
			<?php echo $uamUserGroup->getGroupName().$addition; ?>
		</label>
		<a class="uam_group_info_link">(<?php echo TXT_INFO; ?>)</a>
		<?php include 'groupInfo.php'; ?>
	</li>
	<?php
}
?>
</ul>