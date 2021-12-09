import React from 'react'
import { __ } from "@wordpress/i18n";
import rtEvents from 'rt-events'


function Header() {
	return (
		<div className="main--wrapper">
			<header >
				<div className="container">
					<div onClick={(e) => e.shiftKey &&
						rtEvents.trigger('ct:dashboard:heading:advanced-click')} className="header--wrapper">
						{RishiDashboard.has_heading.has_theme_name ||
							(<div className="logo">
								<a href="#">
									<svg width="193" height="53" viewBox="0 0 193 53" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M98.8594 46H92.3672L82.2891 36.3906H67.5703V31.6562H86.8594C87.8594 31.6562 88.7969 31.4688 89.6719 31.0938C90.5469 30.7031 91.3047 30.1797 91.9453 29.5234C92.6016 28.8672 93.1172 28.1016 93.4922 27.2266C93.8672 26.3359 94.0547 25.3906 94.0547 24.3906C94.0547 23.3906 93.8672 22.4531 93.4922 21.5781C93.1172 20.7031 92.6016 19.9453 91.9453 19.3047C91.3047 18.6484 90.5469 18.1328 89.6719 17.7578C88.7969 17.3828 87.8594 17.1953 86.8594 17.1953H64.875V46H60.0703V12.3906H86.8594C88.5156 12.3906 90.0703 12.7109 91.5234 13.3516C92.9766 13.9766 94.2422 14.8359 95.3203 15.9297C96.4141 17.0078 97.2734 18.2734 97.8984 19.7266C98.5391 21.1797 98.8594 22.7344 98.8594 24.3906C98.8594 25.8906 98.6016 27.3125 98.0859 28.6562C97.5703 29.9844 96.8594 31.1797 95.9531 32.2422C95.0469 33.2891 93.9766 34.1641 92.7422 34.8672C91.5234 35.5547 90.2031 36.0156 88.7812 36.25L98.8594 46ZM109.195 46H104.438V19.6094H109.195V46ZM145.055 38.2188C145.055 39.2969 144.852 40.3125 144.445 41.2656C144.039 42.2031 143.484 43.0234 142.781 43.7266C142.094 44.4297 141.273 44.9844 140.32 45.3906C139.383 45.7969 138.375 46 137.297 46H114.867V41.1953H137.297C137.719 41.1953 138.109 41.125 138.469 40.9844C138.844 40.8281 139.164 40.6172 139.43 40.3516C139.711 40.0703 139.93 39.75 140.086 39.3906C140.242 39.0312 140.32 38.6406 140.32 38.2188C140.32 37.7969 140.242 37.4062 140.086 37.0469C139.93 36.6719 139.711 36.3516 139.43 36.0859C139.164 35.8047 138.844 35.5859 138.469 35.4297C138.109 35.2734 137.719 35.1953 137.297 35.1953H122.602C121.539 35.1953 120.539 34.9922 119.602 34.5859C118.664 34.1797 117.844 33.625 117.141 32.9219C116.438 32.2031 115.883 31.3672 115.477 30.4141C115.07 29.4609 114.867 28.4453 114.867 27.3672C114.867 26.3203 115.07 25.3281 115.477 24.3906C115.883 23.4375 116.438 22.6094 117.141 21.9062C117.844 21.2031 118.664 20.6484 119.602 20.2422C120.539 19.8203 121.539 19.6094 122.602 19.6094H143.297V24.3438H122.602C122.195 24.3438 121.805 24.4297 121.43 24.6016C121.07 24.7578 120.758 24.9766 120.492 25.2578C120.227 25.5234 120.016 25.8438 119.859 26.2188C119.703 26.5781 119.625 26.9609 119.625 27.3672C119.625 27.7891 119.703 28.1875 119.859 28.5625C120.016 28.9219 120.227 29.2422 120.492 29.5234C120.758 29.7891 121.07 30 121.43 30.1562C121.805 30.3125 122.195 30.3906 122.602 30.3906H137.297C138.375 30.3906 139.383 30.6016 140.32 31.0234C141.273 31.4297 142.094 31.9922 142.781 32.7109C143.484 33.4141 144.039 34.2422 144.445 35.1953C144.852 36.1484 145.055 37.1562 145.055 38.2188ZM177.797 46H172.992V35.2422H157.125V30.4375H172.992V19.6094H177.797V46ZM154.852 46H150.047V19.6094H154.852V46ZM189.492 46H184.734V19.6094H189.492V46Z" fill="white" />
										<path fillRule="evenodd" clipRule="evenodd" d="M30.1721 36.058L0 0V37.7432H22.5984L0 37.7432V49H41L30.1721 36.058Z" fill="url(#paint0_linear)" />
										<path d="M41 18.8716C40.999 21.3488 40.5211 23.8015 39.5937 26.0888C38.6663 28.3762 37.3077 30.4533 35.5957 32.2009C34.0273 33.8089 32.1904 35.1153 30.1721 36.058L0 0H22.5984C27.4744 0.0148474 32.1465 2.00787 35.5943 5.54377C39.0421 9.07967 40.9855 13.8711 41 18.8716Z" fill="url(#paint1_linear)" />
										<defs>
											<linearGradient id="paint0_linear" x1="22.9118" y1="-32.2583" x2="13.789" y2="55.5043" gradientUnits="userSpaceOnUse">
												<stop offset="0.078125" stopColor="white" />
												<stop offset="1" stopColor="white" stopOpacity="0" />
											</linearGradient>
											<linearGradient id="paint1_linear" x1="41" y1="-22.4583" x2="13.3977" y2="29.4515" gradientUnits="userSpaceOnUse">
												<stop stopColor="white" />
												<stop offset="1" stopColor="white" stopOpacity="0" />
											</linearGradient>
										</defs>
									</svg>
								</a>
							</div>)}
						<div className="details">
							<p> {RishiDashboard.has_heading.has_theme_description || __('Rishi Theme is core web vitals optimized WordPress theme. It lightning fast, lightweight and highly customizable. Speed optimized and SEO-friendly.', 'rishi')} </p>
						</div>
					</div>
				</div>
			</header>
		</div >

	)
}

export default Header