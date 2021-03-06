; =========================================================================
;+
; Project     : The General IDL SYNoptic IMage Object (SYNIMON)
;
; Name        : SYNIMON_INFO__DEFINE
;
; Purpose     : Used by SYNIMON__DEFINE for dynamic data handling.
;
; Category    : Ancillary Synoptic Objects
;
; Syntax      : N/A
;
; Example     : 
;
; Notes       :
;
; History     : 18-AUG-2007 Written (My birthday!), Paul Higgins, (ARG/TCD)
;               14-OCT-2008 Changed object name from SYNIMON to SYNIMON, Paul Higgins, (ARG/TCD)
;
; Tutorial    : Not yet. For now take a look at the configuration section of 
;               http://solarmonitor.org/objects/solmon
;
; Contact     : P.A. Higgins: pohuigin {at} gmail {dot} com
;               P. Gallagher: peter.gallagher {at} tcd {dot} ie
;-
; =========================================================================

;-------------------------------------------------------->

PRO SYNIMON_info__define

  struct = { SYNIMON_info, $
	data: fltarr(1024,1024), $

	;--<< Map header variables. >>

	ut: '', $
	obs: '', $
	instrument: '', $
	filter: '', $
	timerange: ['',''], $
	header: strarr(2,13) $

	}
	 
END

;-------------------------------------------------------->