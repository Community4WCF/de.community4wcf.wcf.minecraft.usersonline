<div class="{cycle values='container-1,container-2'}">
	<div class="containerIcon"><img src="{icon}minecraftUsersOnlineM.png{/icon}" alt="" /></div>
	<div class="containerContent">
		<h3>{lang}wcf.index.minecraft.usersonline{/lang}</h3>
		<p class="smallFont">{lang}wcf.index.minecraft.usersonline.description{/lang}</p>
		{foreach from=$minecraftUsersOnline.users item=user}
				{counter assign=counter print=false}						
				{if $counter > 1}, {/if}<span>{$user.name}</span>
		{/foreach}
	</div>
</div>