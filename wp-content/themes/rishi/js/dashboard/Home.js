import React from 'react';
import { __ } from "@wordpress/i18n";
import CustomizerOptions from './ui-components/CustomizerOptions';
import { applyFilters } from '@wordpress/hooks';
import {
	SiteIdentityIcon,
	ColorSettingsIcon,
	TypographySettingsIcon,
	LayoutSettingsIcon,
	HeaderBuilderIcon,
	BlogSettingsIcon,
	PageSettingsIcon,
	SidebarSettingsIcon,
	FooterBuilderIcon,
	RightArrow,
	DocumentIcon,
	RightIcon,
	VideoIcon,
	SupportIcon
} from './ui-components/Icons';
import Sidebar from './ui-components/Sidebar';

export const Home = () => {
	return (
		<>
			<div className="home--wrapper">
				<div className="container">
					{applyFilters('rishi_license_activation_placeholder', null)}
					<div className="customizer--wrapper">
						<h1>{__('Customizer options', 'rishi')}</h1>
						<div className="customizer--grid--wrapper">
							<div className="customizer--cards">
								<CustomizerOptions Title="Site Identity" Icon={<SiteIdentityIcon />} RightArrow={<RightArrow />} Link="header&rt_autofocus=header:builder_panel_logo" />
								<CustomizerOptions Title="Color Settings" Icon={<ColorSettingsIcon />} RightArrow={<RightArrow />} Link="colors_panel" />
								<CustomizerOptions Title="Typography Settings" Icon={<TypographySettingsIcon />} RightArrow={<RightArrow />} Link="typography" />
								<CustomizerOptions Title="Layout Settings" Icon={<LayoutSettingsIcon />} RightArrow={<RightArrow />} Link="layout" />
								<CustomizerOptions Title="Header Builder" Icon={<HeaderBuilderIcon />} RightArrow={<RightArrow />} Link="header" />
								<CustomizerOptions Title="Blog Settings" Icon={<BlogSettingsIcon />} RightArrow={<RightArrow />} Link="blogarchive" />
								<CustomizerOptions Title="Page Settings" Icon={<PageSettingsIcon />} RightArrow={<RightArrow />} Link="pages" />
								<CustomizerOptions Title="Sidebar Settings" Icon={<SidebarSettingsIcon />} RightArrow={<RightArrow />} Link="layout" />
								<CustomizerOptions Title="Footer Builder" Icon={<FooterBuilderIcon />} RightArrow={<RightArrow />} Link="footer" />
							</div>
							{(!RishiDashboard.plugin_data.hide_support_link || !RishiDashboard.plugin_data.hide_doc_link || !RishiDashboard.plugin_data.hide_roadmap ) &&
								<div className="sidebar--wrapper">
									{RishiDashboard.plugin_data.hide_support_link ? '' :
										<Sidebar SidebarTitle="Documentation" SidebarContent="Need help with using the WordPress as quickly as possible? Visit our well-organized Knowledge Base!"
											SidebarIcon={<DocumentIcon />} SidebarBtnContent="Documentation" SidebarRightIcon={<RightIcon />} SidebarLink={"https://rishitheme.com/docs/"} />}
									{RishiDashboard.plugin_data.hide_doc_link ? '' :
										<Sidebar SidebarTitle="Support" SidebarContent="If the Knowledge Base didn't answer your queries, submit us a support ticket here. Our response time usually is less than a business day, except on the weekends."
											SidebarIcon={<SupportIcon />} SidebarBtnContent="Submit a Ticket" SidebarRightIcon={<RightIcon />} SidebarLink={RishiDashboard.support_url} />}
									{RishiDashboard.plugin_data.hide_roadmap ? '' :
									<Sidebar SidebarTitle="Roadmap" SidebarContent="Request and upvote a feature or see what are the future plans for Rishi theme."
											SidebarIcon={<SupportIcon />} SidebarBtnContent="View our Roadmap" SidebarRightIcon={<RightIcon />} SidebarLink={RishiDashboard.roadmap_url} />}
								</div>}
						</div>
					</div>
				</div>
			</div>
		</>
	)
}

export default Home;
