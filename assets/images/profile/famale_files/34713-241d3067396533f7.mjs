"use strict";(self.__LOADABLE_LOADED_CHUNKS__=self.__LOADABLE_LOADED_CHUNKS__||[]).push([[34713],{27255:(e,r,t)=>{t.d(r,{Z:()=>o});let o={AMP_TRACKING_DOMAIN:"amp.pinterest.com",BoardPrivacy:{SECRET:"secret",PUBLIC:"public",PROTECTED:"protected"},BoardType:{PROTECTED:"protected"},BulkAction:{MOVE:"bulkMove",COPY:"bulkCopy",CREATE_SECTION:"bulkCreateSection",DELETE:"bulkDelete"},MAX_CHARS_FOR_BOARD_PIN_DESCRIPTION:500,MAX_CHARS_FOR_BOARD_TITLE:50,MAX_CHARS_FOR_FIRST_NAME:30,MAX_FETCH_NUM_FOLLOWERS_PER_PAGE:50,MAX_STORED_VISITED_PIN_PAGES:10,VIDEO_IFRAME_ID:"video-iframe"}},123159:(e,r,t)=>{t.d(r,{F:()=>p,M:()=>l});var o=t(667294),s=t(702664),i=t(14890),a=t(425288),n=t(332611),d=t(957191),c=t(785893);let{Provider:u,useHook:l}=(0,a.Z)("ExperienceContext");function p({children:e}){let[r,t]=(0,o.useReducer)((e,r)=>{if("MOUNT_PLACEMENT"===r.type)return{...e,mountedPlacements:{...e.mountedPlacements,[r.payload]:!0}};if("UNMOUNT_PLACEMENT"===r.type){let t={...e};return delete t.mountedPlacements[r.payload],delete t.registerdAfterActionPlacements[r.payload],t}return"REGISTER_AFTER_ACTION_PLACEMENT"===r.type?{...e,registerdAfterActionPlacements:{...e.registerdAfterActionPlacements,[r.payload]:!0}}:e},{mountedPlacements:{},registerdAfterActionPlacements:{}}),{mountedPlacements:a,registerdAfterActionPlacements:l}=r,p=(0,s.useDispatch)(),_=(0,s.useSelector)(e=>e.experiences),y=(0,n.be)(),E=(0,n.Am)(),R=(0,n.Ig)(),m=(0,o.useMemo)(()=>{let e=(0,i.bindActionCreators)({completeExperience:y,dismissExperience:E,fetchAllExperiences:n.fO,fetchAllExperiencesMulti:d.NW,fetchExperienceForPlacements:n.pz,mountPlacement:n.N,triggerExperimentsForPlacement:n.kd,viewExperience:R},p);return{...e,mountPlacement:(r,...o)=>{e.mountPlacement(r,...o),t({type:"MOUNT_PLACEMENT",payload:r})},unmountPlacement:e=>{t({type:"UNMOUNT_PLACEMENT",payload:e})},registerAfterActionPlacement:e=>{t({type:"REGISTER_AFTER_ACTION_PLACEMENT",payload:e})}}},[y,E,p,t,R]),f=(0,o.useMemo)(()=>({experiences:_,mountedPlacements:a,registerdAfterActionPlacements:l,...m}),[_,a,l,m]);return(0,c.jsx)(u,{value:f,children:e})}},497529:(e,r,t)=>{t.d(r,{Z:()=>n});var o=t(667294);t(332611);var s=t(123159),i=t(764990);t(957191);var a=t(780280);function n(e){let{mountedPlacements:r,completeExperience:t,dismissExperience:n,experiences:d,fetchAllExperiences:c,fetchAllExperiencesMulti:u,fetchExperienceForPlacements:l,triggerExperimentsForPlacement:p,viewExperience:_}=(0,s.M)(),{isBot:y}=(0,a.B)(),E=e&&!y?(0,i.MQ)(d,r,e):null;return(0,o.useMemo)(()=>({completeExperience:t,dismissExperience:n,experienceForPlacement:E,fetchAllExperiences:c,fetchAllExperiencesMulti:u,fetchExperienceForPlacements:l,triggerExperimentsForPlacement:p,viewExperience:_}),[t,n,E,c,u,l,p,_])}},932995:(e,r,t)=>{t.d(r,{Z:()=>o});function o(e,r,t){let o=[...e],s=o.splice(r,1)[0];return o.splice(t,0,s),o}},909499:(e,r,t)=>{t.d(r,{Hd:()=>c,_R:()=>n,gi:()=>i,lw:()=>o,oD:()=>s,wF:()=>d,zh:()=>a});let o={PINS:"pins",PINS_BUYABLE:"buyable_pins",PINS_MINE:"my_pins",PINS_VIDEO:"videos",BOARDS:"boards",USERS:"users",IDEA_PINS:"idea_pins",MY_CONTENT:"my_content"},s=e=>{let r=Object.values(o).find(r=>r===e);return null!=r?r:void 0},i=e=>{switch(e){case o.PINS:return 0;case o.PINS_MINE:return null;case o.PINS_BUYABLE:return 1;case o.PINS_VIDEO:return 2;case o.BOARDS:return 3;case o.USERS:return 4;default:return null}},a=e=>{switch(e){case 0:return o.PINS;case 1:return o.PINS_BUYABLE;case 2:return o.PINS_VIDEO;case 3:return o.BOARDS;case 4:return o.USERS;default:return null}},n=e=>{switch(e){case o.PINS_MINE:return 107;case o.PINS_BUYABLE:return 254;case o.PINS_VIDEO:return 3306;case o.BOARDS:return 44;case o.USERS:return 45;case o.MY_CONTENT:return 189;case o.PINS:default:return 43}},d=e=>{switch(e){case o.PINS:return 60;case o.PINS_MINE:case o.MY_CONTENT:return 63;case o.PINS_BUYABLE:return 3800;case o.PINS_VIDEO:return 64;case o.BOARDS:return 61;case o.USERS:return 62;default:return null}},c=(e,r)=>{if(r)switch(e){case o.USERS:return 1000392;case o.PINS_BUYABLE:return 1000391;case o.PINS:default:return 29}switch(e){case o.USERS:return 1000432;case o.PINS_BUYABLE:return 1000433;case o.PINS:default:return 1000269}}},343341:(e,r,t)=>{t.d(r,{F9:()=>i,Zo:()=>s});var o=t(425288);let{Provider:s,useHook:i}=(0,o.Z)("toastManagerContext")},998651:(e,r,t)=>{t.d(r,{L:()=>d,r:()=>n});var o=t(385740),s=t(595371),i=t(909499);let a=["search_articles_story","search_for_you_upsell","search_story_separator","search_story_landing_page_header","shop_tab_upsell","story_pins_search_upsell","structured_search_bubble","user_style_story_v2","guided_search_entry_points_story"];function n({query:e,rs:r,scope:t},a){let n=(0,o.BE)(),d=!(null!=n&&n.viewType)&&!(null!=n&&n.viewParameter),c=(0,i.wF)(t);if(!d&&c){let{viewType:t,viewParameter:o}=null!=n?n:{};a({event_type:c,view_type:t,view_parameter:o,aux_data:{query:e,rs:r||s.i.UNKNOWN}})}r===s.i.HASHTAG_CLOSEUP?a({event_type:101,component:13065,element:10273,view_type:142}):r===s.i.HASHTAG_PINREP&&a({event_type:101,component:0,element:10349,view_type:142})}let d=(e=[])=>{let r=!0;return e.reduce((e,t)=>{var o;return r&&t.story_type&&a.includes(t.story_type)&&(null===(o=t.display_options)||void 0===o?void 0:o.num_columns_requested)===0?e.searchFullWidthStories.push(t):(r=!1,e.filteredResults.push(t)),e},{searchFullWidthStories:[],filteredResults:[]})}},59644:(e,r,t)=>{t.d(r,{Z:()=>o});let o=(e,r)=>`${e}:${r||""}`},422946:(e,r,t)=>{t.d(r,{J:()=>m,Z:()=>P});var o=t(932995),s=t(338739),i=t(648284),a=t(998651),n=t(59644),d=t(483025),c=t(819063),u=t(492583);let l=new Set(["PinResource","RepinResource"]),p={ApiResource:e=>{if((null==e?void 0:e.url)==="/v3/orientation/nux_creator_recommendations/")return"nux-creator-recommendations";if((null==e?void 0:e.url)==="/v3/users/me/interests/"){var r;return`recommended-interests:${null===(r=e.data)||void 0===r?void 0:r.blend_type}`}return""},AggregatedActivityFeedResource:e=>`trieditfeed:${e.aggregated_pin_data_id}`,AggregatedCommentFeedResource:e=>`aggregated-comments:${e.objectId}`,AggregatedCommentReplyFeedResource:e=>`${u.Z.AGGREGATED_COMMENT_REPLIES}:${e.objectId}`,BoardlessPinsResource:e=>`boardless-pins:${e.userId}`,BestPinsFeedAltResource:e=>`idea-page-best-pins:${e.interest}`,BoardArchiveResource:()=>"archived-boards",BoardContentRecommendationResource:e=>`recommendation-feed:${e.id}`,BoardFeedResource:e=>`boardfeed:${e.board_id}`,BoardSectionsRepinResource:e=>`board-sections:${e.board_id}`,BoardSectionsResource:e=>`board-sections:${e.board_id}`,BoardSectionPinsResource:e=>`board-section-pins:${e.section_id}`,BoardsFeedResource:e=>`profile-boards:${e.username}`,BoardToolsFeedResource:e=>`board-tools:${e.boardId}`,ConversationsResource:()=>"conversations",DidItLikedByResource:e=>`triedit-likes:${e.didItDataId}`,DidItUserFeedResource:e=>`profile-tried:${e.username}`,HolidaySpotlightResource:e=>`holiday-spotlight:${e.storyType}`,InterestResource:e=>`klp-pins:${e.interest}`,MoreIdeasTabsBoardsResource:()=>"homefeed-more-ideas-tabs",NewsHubResource:()=>"notifications",NewsHubDetailsResource:e=>`newshubdetail:${e.news_id}`,NuxInterestsResource:()=>"nuxTopics",PinsFromBrandResource:e=>`brand-pins:${e.pin}`,ReactionsResource:e=>`reactions:${e.pin_id}`,RelatedArticlesResource:e=>`related-articles:${e.article_id}`,RelatedModulesResource:e=>`related-modules:${e.pin_id}`,RelatedPinFeedResource:e=>`related-pins:${e.pin}`,RelatedProductFeedResource:e=>"pin"===e.shop_source?`closeup-related-products:${e.pin}`:`related-products:${e.pin}`,RelatedStreamResource:e=>`related-story-pins:${e.pinId}`,SearchResource:e=>{let r=`search:${e.scope}:${e.query}:${e.filters||""}:${e.article||""}`;return e.auto_correction_disabled?`${r}:auto-correction-disabled`:r},BaseSearchResource:e=>{let r=`search:${e.scope}:${e.query}:${e.filters||""}:${e.appliedProductFilters}:${e.article||""}`;return e.auto_correction_disabled?`${r}:auto-correction-disabled`:r},SectionToolsFeedResource:e=>`section-tools:${e.sectionId}`,ShareSuggestionsTypeaheadResource:e=>`share-suggestions:${e.board||e.user}:${e.term}`,ShoppingFeedModularizedResource:e=>e.saved_products_only?`board-shop-saved:${e.board_id}`:`board-shop-related:${e.board_id}`,StoryFeedResource:e=>`story-feed:${e.feed_type}:${e.request_params}`,SuggestedCreatorFollowsResource:()=>"suggested-creator-follows",StoryPinTaggedProductsResource:()=>"story-pin-tagged-products",TodayArticleFeedResource:e=>`today-article:${e.id}`,IdeasHubTodayArticlesResource:e=>`today-article:${e.interest_id}`,TodayTabInterestFeedResource:e=>`today-article-interestfeed:${e.interest_id}`,TodayTabResource:()=>"today-tab",SeoTier1CandidateResource:()=>"tier1-feed",UnifiedCommentsResource:e=>`unified-comments:${e.aggregated_pin_id}`,UserActivityPinsResource:e=>`profile-pins-feed:${e.user_id}`,UserHomefeedResource:e=>e.pin_quiz?"pin-quiz":"homefeed",UserFollowingResource:e=>`user-following:${e.username}`,UserRecentActivityResource:e=>`user-recent-activity:${e.filter_type}`,UserStoryPinsFeedResource:e=>`story-pins-feed:${e.user_id}`,VideosFeedResource:()=>"videos-feed",VisualLiveSearchResource:e=>`visual-search:${e.pin_id}:${e.crop.x}${e.crop.y}${e.crop.w}${e.crop.h}`,VisualLiveSearchProductFeedResource:e=>`visual-search-products:${e.pin_id}:${e.crop.x}${e.crop.y}${e.crop.w}${e.crop.h}`,VisualSearchFlashlightUnifiedResource:e=>`related-products-unified:${e.pin_id}`,BoardFollowingResource:e=>`board-following:${e.username}`,InterestFollowingResource:e=>`topic-following:${e.username}`,UserPinsResource:e=>`profile-pins:${e.username}`,TopicFeedResource:e=>e.best_pins?`best-topic-pins:${e.interest}`:`topic-pins:${e.interest}`},_={AggregatedActivityFeedResource:({options:{aggregated_pin_data_id:e}})=>({type:u.Z.TRIED_IT_FEED,id:e}),AggregatedCommentFeedResource:({options:{objectId:e}})=>({type:u.Z.AGGREGATED_COMMENTS,id:e}),AggregatedCommentReplyFeedResource:({options:{isUnifiedComment:e,objectId:r}})=>({type:e?u.Z.AGGREGATED_COMMENT_REPLIES:u.Z.AGGREGATED_COMMENTS,id:r,reversed:!0}),BoardFeedResource:({options:{board_id:e}})=>({type:u.Z.BOARDFEED,id:e}),BoardlessPinsResource:({options:{userId:e}})=>({type:u.Z.BOARDLESS_PINS,id:e}),BoardSectionPinsResource:({options:{section_id:e}})=>({type:u.Z.BOARD_SECTION_PINS,id:e}),BoardSectionsResource:({options:{board_id:e}})=>({type:u.Z.BOARD_SECTIONS,id:e}),BoardsResource:({options:{username:e,sort:r}})=>({type:u.Z.PROFILE_BOARDS,id:(0,n.Z)(e,r)}),BaseSearchResource:({options:{auto_correction_disabled:e,appliedProductFilters:r,scope:t,filters:o,query_pin_sigs:s,query:n,user:d},response:c})=>{var l;return{type:u.Z.SEARCH_PINS,id:(0,i.Tb)({appliedProductFilters:r,autoCorrectionDisabled:e,filters:o,query:n,selectedPinImgSig:s,scope:t,user:d}),items:null!==(l=c.resource_response.data)&&void 0!==l&&l.results?(0,a.L)(c.resource_response.data.results).filteredResults:[]}},DidItCommentsResource:({options:{objectId:e}})=>({type:u.Z.AGGREGATED_COMMENTS,id:e,reversed:!0}),DidItUserFeedResource:({options:{username:e}})=>({type:u.Z.TRIED_IT_FEED,id:e}),IdeasHubTodayArticlesResource:({options:{interest_id:e}})=>({type:u.Z.TODAY_TAB,id:e}),RelatedArticlesResource:({options:{article_id:e}})=>({type:u.Z.TODAY_TAB,id:e}),StoryPinDraftsResource:({options:{userId:e}})=>({type:u.Z.STORY_PIN_DATA,id:e}),TodayTabInterestFeedResource:({options:{interest_id:e}})=>({type:u.Z.TODAY_ARTICLE_INTEREST_FEED,id:e}),TodayTabResource:()=>({type:u.Z.TODAY_TAB,id:"todayTab"}),UnifiedCommentsPreviewResource:({options:{aggregated_pin_id:e}})=>({type:u.Z.UNIFIED_COMMENTS,id:e}),UnifiedCommentsResource:({options:{aggregated_pin_id:e,is_reversed:r}})=>({type:u.Z.UNIFIED_COMMENTS,id:e,reversed:r}),UserActivityPinsResource:({options:{user_id:e}})=>({type:u.Z.PROFILE_PINS_FEED,id:e}),UserStoryPinsFeedResource:({response:e,options:{user_id:r}})=>({type:u.Z.STORY_PINS_FEED,id:r,items:e.resource_response.data||[]})},y=(e,{pinId:r,feedId:t})=>e[t]?{...e,[t]:e[t].filter(e=>!("pin"===e.type&&e.id===r))}:e,E=(e,{pinId:r,feedId:t})=>e[t]?{...e,[t]:[{type:"pin",id:r},...e[t]]}:e,R=(e,{pinId:r,oldFeedId:t,newFeedId:o})=>t===o?e:E(y(e,{pinId:r,feedId:t}),{pinId:r,feedId:o}),m=(e,r)=>e in p?p[e](r):null,f=(e,r)=>{switch(e.type){case"story":return{id:e.id,type:"story",story_type:e.story_type};case"module":return{id:e.id,type:"module",name:e.name};case"user":return{id:e.id,type:"user"};case"board":return r===u.Z.PROFILE_BOARDS?{id:e.id,type:"board",onProfile:!0,profileGroup:e.archived_by_me_at?"archived":e.privacy||"public"}:{id:e.id,type:"board",onProfile:!1};case"board_section":return{type:"boardsection",id:e.id};case"triedit":return{type:"triedit",id:e.id};case"aggregatedcomment":return{type:"aggregatedcomment",id:e.id};case"home_feed_tab":return{type:"home_feed_tab",id:e.id,name:e.name};case"storypindata":return{id:e.id,type:"storypindata"};case"todayarticle":return{type:"todayarticle",id:e.id};case"unifiedcommentspreview":return"userdiditdata"===e.unified_comment.type?{type:"triedit",id:e.unified_comment.id}:{type:"aggregatedcomment",id:e.unified_comment.id};default:return{type:"pin",id:e.id}}},S=(e,r)=>r?`board-section-pins:${r}`:`boardfeed:${e}`,I=(e,r,t)=>{let o=t||d.Z[e];if(o===c.LR)return r.result;if(o===c.sN)return r.result.map(e=>({id:e,schema:"board"}));if(o===c.Gn)return r.result.map(e=>({id:e,schema:"user"}));if(o===c.Ht)return r.result.map(e=>({id:e,schema:"invite"}));if(o===c.fE)return r.result.map(e=>({id:e,schema:"reaction"}));if("object"==typeof o){let e=Object.entries(o).find(([e,r])=>r===c.LR);if(e)return r.result[e[0]]}return null},A=(e,r)=>e.map(e=>{let{id:t,schema:o,type:s}=e;return"home_feed_tabs"===s?e:o?{id:t,type:o,trackingParams:"pin"===o?r.pins[t].tracking_params:void 0,user_id:void 0}:null}).filter(Boolean),b=(e,r,t)=>Object.keys(e).reduce((o,s)=>{let i=e[s]||[],a=i.filter(e=>!(e.type===r&&e.id===t));return i.length!==a.length&&(o[s]=a),o},{...e}),P=(e={},r)=>{switch(r.type){case s.zP:case s.aW:{let{payload:o}=r,{resource:i,options:a,normalizedResponse:n,schema:d}=o;if(n&&i in p){let t=I(i,n,d);if(t&&Array.isArray(t)){let o=p[i](a);if("ShoppingFeedModularizedResource"===i){let{board_id:r,saved_products_only:o}=null!=a?a:{},s=`board-shop-related:${r}`,i=`board-shop-saved:${r}`,d=`board-shop-saved-preview:${r}`,c=[...e[s]||[]],u=[...e[i]||[]],l=[...e[d]||[]],p=A(t,n.entities);return p.forEach(e=>{if(o)u.push(e);else{var t;n.entities.pins&&(null===(t=n.entities.pins[e.id])||void 0===t?void 0:t.board)===r?l.push(e):c.push(e)}}),{...e,[s]:c,[i]:u,[d]:l}}if("BoardToolsFeedResource"===i||"SectionToolsFeedResource"===i)return{...e,[o]:t};{let i=(r.type===s.aW&&e[o]||[]).concat(A(t,n.entities));return{...e,[o]:i}}}}else{var t;let{data:i}=o.response.resource_response;if(!(null!==(t=o.options)&&void 0!==t&&t.redux_normalize_feed))return e;let a=_[o.resource]({options:o.options,response:o.response});if(a){let{type:t,id:o,items:n,reversed:d}=a,c=(n||i||[]).map(e=>f(e,t));d&&(c=c.reverse());let u=`${t}:${o}`,l=e[u];if(l||r.type!==s.aW){let t=l||[],o=c;return r.type===s.aW&&(o=d?c.concat(t):t.concat(c)),{...e,[u]:o}}}}break}case"FEED_ITEM_REORDERED":{let{payload:{feedType:t,feedId:s,itemType:i,targetItemId:a,sourceItemId:n}}=r,d=`${t}:${s}`,c=e[d]||[],l=-1,p=-1;if([u.Z.BOARDFEED,u.Z.BOARD_SECTION_PINS,u.Z.BOARD_SECTIONS,"profileBoards"].includes(t)&&(l=c.findIndex(e=>e.type===i&&e.id===n),p=c.findIndex(e=>e.type===i&&e.id===a)),-1!==l&&-1!==p)return{...e,[d]:(0,o.Z)(c,l,p)};break}case"FEED_ITEMS_REMOVED":{let{payload:{feedType:t,feedId:o,inverseSelection:s,itemType:i,itemIds:a=[]}}=r,n=`${t}:${o}`,d=e[n]||[];if(d&&d.length>0&&(t===u.Z.BOARD_SECTION_PINS||t===u.Z.BOARDFEED)){let r=d.filter(e=>{let r=a.includes(e.id),t=e.type===i&&(s&&!r||!s&&r);return!t}),t=!!r.find(e=>"pin"===e.type);return{...e,[n]:t?r:[]}}if(d&&d.length>0&&t===u.Z.BOARD_SECTIONS){let r=d.filter(e=>{let r=a.includes(e.id);return!(e.type===i&&r)});return{...e,[n]:r}}if(d&&d.length>0&&(t===u.Z.AGGREGATED_COMMENTS||t===u.Z.BOARDLESS_PINS||t===u.Z.PROFILE_PINS_FEED||t===u.Z.STORY_PINS_FEED||t===u.Z.UNIFIED_COMMENTS||t===u.Z.TRIED_IT_FEED||t===u.Z.STORY_PIN_DATA)){let r=d.filter(e=>{let r=a.includes(e.id);return!(e.type===i&&r)});return{...e,[n]:r}}break}case"FEED_ITEMS_ADDED":{let{payload:{feedType:t,feedId:o,itemType:s,itemIds:i=[],prepend:a}}=r,n=`${t}:${o}`,d=e[n]||[];if(d&&(t===u.Z.BOARD_SECTION_PINS||t===u.Z.BOARDFEED||t===u.Z.BOARDLESS_PINS)){let r=i.map(e=>({id:e,type:s})),t=0;"story"===(d[0]||{}).type&&(t=1),"story"===(d[1]||{}).type&&(t=2);let o=[...d.slice(0,t),...r,...d.slice(t)];return{...e,[n]:o}}if(d&&t===u.Z.BOARD_SECTIONS){let r=[...i].reverse().map(e=>({id:e,type:"boardsection"})),t=d?[...r,...d]:[...r];return{...e,[n]:t}}if(t===u.Z.AGGREGATED_COMMENTS||t===u.Z.AGGREGATED_COMMENT_REPLIES||t===u.Z.PROFILE_PINS_FEED||t===u.Z.STORY_PINS_FEED||t===u.Z.UNIFIED_COMMENTS){let r=i.map(e=>({id:e,type:s})),t=d?[...a?r:d,...a?d:r]:r;return{...e,[n]:t}}if(t===u.Z.TRIED_IT_FEED){let r=i.map(e=>({id:e,type:s})),t=d?[...r,...d]:r;return{...e,[n]:t}}break}case"FEED_INVALIDATE":{let{payload:{feedType:t,feedId:o}}=r,s=`${t}:${o}`,i=e[s]||[];if(i)return{...e,[s]:null};break}case"APPEND_FEED_ITEMS":{let{payload:{id:t,items:o,options:s}}=r,i=e[t];if(!i)return{...e,[t]:o};{let r;return r=s.isPrepend?i[0]&&"story"===i[0].type?[].concat(i[0],o,i.slice(1)):o.concat(i):i.concat(o),{...e,[t]:r}}}case"PIN_DELETE":{let{payload:{pinId:t}}=r;return b(e,"pin",t)}case"BOARD_ARCHIVE":{let{payload:{boardId:t,username:o}}=r,s=`profile-boards:${null!=o?o:""}`;if(e[s])return{...e,[s]:e[s].filter(e=>e.id!==t)};break}case"BOARD_UNARCHIVE":{let{payload:{boardId:t}}=r,o="archived-boards";if(e[o])return{...e,[o]:e[o].filter(e=>e.id!==t)};break}case"BOARD_DELETE":{let{payload:{boardId:t}}=r;return b(e,"board",t)}case"BOARD_SECTION_DELETE":{let{payload:{boardSectionId:t}}=r;return b(e,"boardsection",t)}case"PINS_MOVE":{let{payload:{source:t,target:o,pinIds:s,userId:i}}=r,a=t.boardlessPins&&i&&`boardless-pins:${i}`||t.boardId&&S(t.boardId,t.sectionId),n=S(o.boardId,o.sectionId);return s.reduce((e,r)=>R(e,{pinId:r,oldFeedId:a,newFeedId:n}),e)}case"PINS_MOVE_ALL":{let{payload:{source:t,target:o,excludePinIds:s}}=r,i=S(t.boardId,t.sectionId),a=S(o.boardId,o.sectionId),n={...e,[i]:s.map(e=>({type:"pin",id:e}))};return delete n[a],n}case"PIN_EDIT":{let{payload:{pinId:t,boardId:o,sectionId:s="",source:{boardId:i,sectionId:a}}}=r,n=S(i,a),d=S(o,s);return R(e,{pinId:t,oldFeedId:n,newFeedId:d})}case s.AF:if(l.has(r.payload.resource)){let t;let o=r.payload.response.resource_response.data,{board:s}=o;if("quick_saves"===s.layout)t=`boardless-pins:${r.payload.options.user_id}`;else{let e=r.payload.options.section;t=e?`board-section-pins:${e}`:`boardfeed:${s.id}`}if(e[t]){let r={...e},s={id:o.id,type:"pin",trackingParams:null==o?void 0:o.tracking_params};return r[t]=[s].concat(e[t]),r}}if("BoardSectionResource"===r.payload.resource&&r.payload.normalizedResponse){let t=r.payload.normalizedResponse.result,o=r.payload.normalizedResponse.entities.boardsections[t].board,s=`board-sections:${o}`;if(e[s]){let r={...e};return r[s]=[{id:t,type:"boardsection"}].concat(e[s]),r}}if("AggregatedCommentResource"===r.payload.resource&&r.payload.normalizedResponse){let t=r.payload.normalizedResponse.result,o={id:t,type:"aggregatedcomment"},s={...e};for(let t of["aggregated-comments","unified-comments"]){let i=`${t}:${r.payload.options.objectId}`;e[i]&&(s={...s,[i]:[o].concat(s[i])})}return s}if("AggregatedCommentReplyResource"===r.payload.resource&&r.payload.normalizedResponse){let t=`${u.Z.AGGREGATED_COMMENT_REPLIES}:${r.payload.options.objectId}`;return{...e,[t]:[...e[t]||[],{id:r.payload.normalizedResponse.result,type:"aggregatedComment"}]}}if("ReactionsResource"===r.payload.resource&&r.payload.normalizedResponse){let{reaction_pin_id:t,reaction_type:o}=r.payload.options;if("reaction"===r.payload.options.action_type){let s=`reactions:${r.payload.options.pin_id}`,i={...e},a={id:`${t}:${r.payload.options.user_id}:${o}`,type:"reaction",trackingParams:void 0};return i[s]=[a].concat(e[s]),i}if("unreaction"===r.payload.options.action_type){let o=`${t}:${r.payload.options.user_id}`;return b(e,"reaction",o)}}break;case"COMPLETE_STORY":{let{payload:{storyId:t}}=r;return b(e,"story",t)}}return e}},204942:(e,r,t)=>{t.d(r,{Z:()=>s});var o=t(383997);function s(e,r,t){return(r=(0,o.Z)(r))in e?Object.defineProperty(e,r,{value:t,enumerable:!0,configurable:!0,writable:!0}):e[r]=t,e}},601413:(e,r,t)=>{t.d(r,{Z:()=>i});var o=t(204942);function s(e,r){var t=Object.keys(e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);r&&(o=o.filter(function(r){return Object.getOwnPropertyDescriptor(e,r).enumerable})),t.push.apply(t,o)}return t}function i(e){for(var r=1;r<arguments.length;r++){var t=null!=arguments[r]?arguments[r]:{};r%2?s(Object(t),!0).forEach(function(r){(0,o.Z)(e,r,t[r])}):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(t)):s(Object(t)).forEach(function(r){Object.defineProperty(e,r,Object.getOwnPropertyDescriptor(t,r))})}return e}},383997:(e,r,t)=>{t.d(r,{Z:()=>s});var o=t(671002);function s(e){var r=function(e,r){if("object"!=(0,o.Z)(e)||!e)return e;var t=e[Symbol.toPrimitive];if(void 0!==t){var s=t.call(e,r||"default");if("object"!=(0,o.Z)(s))return s;throw TypeError("@@toPrimitive must return a primitive value.")}return("string"===r?String:Number)(e)}(e,"string");return"symbol"==(0,o.Z)(r)?r:String(r)}},671002:(e,r,t)=>{t.d(r,{Z:()=>o});function o(e){return(o="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}}}]);
//# sourceMappingURL=https://sm.pinimg.com/webapp/34713-241d3067396533f7.mjs.map