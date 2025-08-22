import Assignment from "./Assignment.js";
import AssignmentTags from "./AssignmentTags.js";
import Panel from "./Panel.js";

export default {
    components: { Assignment, AssignmentTags, Panel },
    template: `
        <Panel v-show="assignments.length"
                 class="w-60">
          <div class="flex justify-between item-start">
            <h2 class="font-bold mb-2">
              {{ title }}
              <span>({{ assignments.length }})</span>
            </h2>
            
            <button v-show="canToggle"
                    @click="$emit('toggle')">&times;</button>
          </div>
          
          <assignment-tags
              v-model:currentTag="currentTag"
              :initial-tags="assignments.map(a => a.tag)"
          />
            
            <ul class="mt-6 border border-gray-600 divide-y divide-gray-600">
                <assignment 
                    v-for="assignment in filterAssignments" 
                    :key="assignment.id"
                    :assignment="assignment"
                ></assignment>
            </ul>
          
          <slot></slot>
        </Panel>
    `,

    props: {
        assignments: Array,
        title: String,
        canToggle: { type:Boolean, default:false },
    },

    data() {
        return {
            currentTag: 'ALL',
        }
    },

    computed: {
        filterAssignments() {
            if (this.currentTag === 'ALL') {
                return this.assignments;
            }

            return this.assignments.filter(a => a.tag === this.currentTag);
        },
    }
}