            <form action="{{route('allreports.view')}}" method="get">
                  <button type="submit" class="{{ request()->routeIs('allreports.view') ? 'border-b-2 border-blue-700 text-blue-700' : 'text-black border-b-2' }} font-medium text-lg px-5 py-2.5 text-center me-2 mb-2  hover:text-blue-700 hover:border-blue-700 transition duration-300">
                   All Reports
             </button> 
             </form>
             <form action="{{route('historicaldata.view')}}" method="get">
                  <button type="submit" class="{{ request()->routeIs('historicaldata.view') ? 'border-b-2 border-blue-700 text-blue-700' : 'text-black border-b-2' }} font-medium text-lg px-5 py-2.5 text-center me-2 mb-2  hover:text-blue-700 hover:border-blue-700 transition duration-300">
                    Historical Data Report
             </button> 
             </form>
             <form action="{{route('casualties.view')}}" method="get">
                  <button type="submit" class="{{ request()->routeIs('casualties.view') ? 'border-b-2 border-blue-700 text-blue-700' : 'text-black border-b-2' }} font-medium text-lg px-5 py-2.5 text-center me-2 mb-2  hover:text-blue-700 hover:border-blue-700 transition duration-300">
                 Casualties Report
             </button> 
             </form>
             <form action="{{route('damagedproperties.view')}}" method="get">
                  <button type="submit" class="{{ request()->routeIs('damagedproperties.view') ? 'border-b-2 border-blue-700 text-blue-700' : 'text-black border-b-2' }} font-medium text-lg px-5 py-2.5 text-center me-2 mb-2  hover:text-blue-700 hover:border-blue-700 transition duration-300">
                Damaged Properties Report
             </button> 
             </form>